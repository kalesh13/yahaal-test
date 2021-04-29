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
     * Returns the total number of male and females in the file. The function tries
     * to read the stats from cache, if the cache exists and valid. Otherwise, stats
     * is computed, stored to cache, and will be returned.
     *  
     * @return array
     */
    public function genderStats();

    /**
     * Returns the gender stats in an array. This function will run through the entire
     * data file. So, if it's not absolutely necessary, read the data from `genderStats()`
     * which tries to read the stats from cache.
     * 
     * @return array
     */
    public function getNonCachedGenderStats();
}
