<?php

namespace App\Repository;

use Illuminate\Support\Collection;

interface IApplication
{
    /**
     * Returns an array of users. If a valid `filter_by` parameter is submitted, only
     * the users that passes the filter check gets
     * 
     * @param \Illuminate\Support\Collection $request
     * @return array
     */
    public function users(Collection $request);

    /**
     * Returns the total number of male and females in the file.
     *  
     * @return array
     */
    public function genderStats();
}
