<?php

namespace App\Services\Filters;

use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class FiltersManager implements IFiltersManager
{
    /**
     * All the registered application filters mapped to corresponding keys.
     * 
     * @var array
     */
    protected $filters = [];

    /**
     * Returns the filter registered for the key `filter_by` key in the request. `NULL` is 
     * returned if no `filter_by` key exists in the request. An exception will be thrown
     * for an invalid `filter_by` value.
     * 
     * @param \Illuminate\Support\Collection $request
     * @return \App\Services\Filters\IFilter|null
     * @throws \Illuminate\Validation\ValidationException
     */
    public function filterFromRequest(Collection $request)
    {
        if ($request->has('filter_by')) {
            Validator::validate($request->all(), [
                'filter_by' => [Rule::in($this->validFilterKeys())]
            ]);
            return $this->filter($request->get('filter_by'))->setConditions($request->all());
        }
    }

    /**
     * Returns an array containing the keys of all the registered filters.
     * 
     * @return array
     */
    protected function validFilterKeys()
    {
        return array_keys($this->filters);
    }

    /**
     * Returns the filter registered for the given key or null if none registered.
     * 
     * @param string $key
     * @return \App\Services\Filters\IFilter|null
     */
    public function filter($key)
    {
        if (is_null($key)) {
            return null;
        }
        $filter = Arr::get($this->filters, $key);

        if (is_callable($filter)) {
            $filter = $this->filters[$key] = call_user_func($filter);
        }
        return $filter instanceof IFilter ? $filter : null;
    }

    /**
     * Registers a new filter for the given key.
     * 
     * @param string $key
     * @param \App\Services\Filters\IFilter|\callable $filter
     * @return \App\Repository\IApplication
     */
    public function registerFilter($key, $filter)
    {
        $this->filters[$key] = $filter;

        return $this;
    }
}
