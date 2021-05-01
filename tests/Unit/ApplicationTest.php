<?php

namespace Tests\Unit;

use Throwable;
use Tests\TestCase;
use App\Repository\IApplication;
use App\Services\FileReader\ICsvReader;

class ApplicationTest extends TestCase
{
    /**
     * The core application repository.
     * 
     * @var \App\Repository\IApplication
     */
    protected $application;

    /**
     * Application csv file reader.
     * 
     * @var \App\Services\FileReader\ICsvReader
     */
    protected $fileReader;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setup();

        $this->fileReader = $this->app->make(ICsvReader::class);
        $this->application = $this->app->make(IApplication::class);
    }

    /**
     * Application should return a collection of users for valid file.
     *
     * @return void
     */
    public function testApplicationReturnsUsersCollectionForValidFile()
    {
        $result = $this->application->users(collect());
        $this->assertGreaterThan(0, $result->count());
    }

    /**
     * Application should return valid gender stats.
     *
     * @return void
     */
    public function testApplicationReturnsGenderStatsForValidFile()
    {
        $result = $this->application->genderStats();
        $this->assertIsArray($result);
        $this->assertArrayHasKey('male', $result);
        $this->assertArrayHasKey('female', $result);
    }

    /**
     * Application should store the gender stats cache, if it does not exist.
     *
     * @return void
     */
    public function testApplicationStoresGenderStatsCache()
    {
        // Set the cache to null
        cache(['userStats' => null]);
        $this->assertTrue(is_null(cache('userStats')));

        $this->application->genderStats();

        $this->assertTrue(!is_null(cache('userStats')));
        $this->assertIsArray($result = cache('userStats'));
        $this->assertArrayHasKey('stats', $result);
        $this->assertArrayHasKey('lastModified', $result);
    }

    /**
     * Application should throw exception for invalid file on calling `users()`
     *
     * @return void
     */
    public function testApplicationGetUsersThrowsForInvalidFile()
    {
        $this->expectException(Throwable::class);
        $this->fileReader->setFilePath(storage_path('invalid_path.txt'));
        $this->application->users(collect());
    }

    /**
     * Application should throw exception for invalid file on calling `getStats()`
     *
     * @return void
     */
    public function testApplicationGetStatsThrowsForInvalidFile()
    {
        $this->expectException(Throwable::class);
        $this->fileReader->setFilePath(storage_path('invalid_path.txt'));
        $this->application->genderStats();
    }
}
