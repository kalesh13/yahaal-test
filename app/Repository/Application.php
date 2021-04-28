<?php

namespace App\Repository;

use App\Services\Users\IUser;
use Illuminate\Support\Collection;
use App\Services\FileReader\ICsvReader;
use App\Services\Filters\IFiltersManager;

class Application implements IApplication
{
    /**
     * A function that resolves a `\App\Services\Users\IUser` from a data array.
     * 
     * @var callable
     */
    protected $userResolver;

    /**
     * Application filter manager.
     * 
     * @var \App\Services\Filters\IFiltersManager
     */
    protected $filtersManager;

    /**
     * The application csv data reader which acts more or less like the database.
     * 
     * @var \App\Services\FileReader\ICsvReader
     */
    protected $fileReader;

    public function __construct($userResolver, IFiltersManager $filtersManager, ICsvReader $fileReader)
    {
        $this->userResolver = $userResolver;
        $this->fileReader = $fileReader;
        $this->filtersManager = $filtersManager;
    }

    /**
     * Returns an array of users. If a valid `filter_by` parameter is submitted, only
     * the users that passes the filter check gets
     * 
     * @param \Illuminate\Support\Collection $request
     * @return array
     */
    public function users(Collection $request)
    {
        $response = collect();
        $filter = $this->filtersManager->filterFromRequest($request);

        $this->runOnEachUserData(
            function (IUser $user) use ($response, $filter) {
                if ($filter) {
                    if (!$filter->passes($user)) {
                        return;
                    }
                }
                $response->add($user);
            }
        );
        return $response;
    }

    /**
     * Runs the given callback on each row of data in the file.
     * 
     * @param \callable $callback
     */
    protected function runOnEachUserData($callback)
    {
        foreach ($this->fileReader->read() as $user_data) {
            $user = $this->resolveUser($user_data);

            $callback($user);
        }
    }

    /**
     * Returns the total number of male and females in the file.
     *  
     * @return array
     */
    public function genderStats()
    {
        $userStats = cache('userStats');
        $lastModified = $this->fileReader->lastModified();

        if ($userStats &&  $lastModified === $userStats['lastModified']) {
            return $userStats['stats'];
        }
        $male = 0;
        $female = 0;

        $this->runOnEachUserData(function (IUser $user) use (&$male, &$female) {
            if ($user->isMale()) {
                $male++;
            }
            if ($user->isFemale()) {
                $female++;
            }
        });
        $userStats = array('stats' => ['male' => $male, 'female' => $female], 'lastModified' => $lastModified);

        cache(['userStats' => $userStats]);

        return $userStats['stats'];
    }

    /**
     * Resolves a user using the given $data and returns it.
     * 
     * @param array $data
     * @return \App\Services\Users\IUser
     */
    public function resolveUser($data)
    {
        return call_user_func($this->userResolver, $data);
    }
}
