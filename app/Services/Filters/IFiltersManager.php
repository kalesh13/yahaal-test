<?php

namespace App\Services\Filters;

use App\Services\Filters\IFilter;
use Illuminate\Support\Collection;

interface IFiltersManager
{
    /**
     * Returns the filter registered for the key `filter_by` key in the request. `NULL` is 
     * returned if no `filter_by` key exists in the request. An exception will be thrown
     * for an invalid `filter_by` value.
     * 
     * @param \Illuminate\Support\Collection $request
     * @return \App\Services\Filters\IFilter|null
     * @throws \Illuminate\Validation\ValidationException
     */
    public function filterFromRequest(Collection $request);

    /**
     * Returns the filter registered for the given key or null if none registered.
     * 
     * @param string $key
     * @return \App\Services\Filters\IFilter|null
     */
    public function filter($key);

    /**
     * Registers a new filter for the given key.
     * 
     * @param string $key
     * @param \App\Services\Filters\IFilter|\callable $filter
     * @return \App\Repository\IApplication
     */
    public function registerFilter($key, $filter);
}
