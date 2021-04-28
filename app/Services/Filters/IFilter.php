<?php

namespace App\Services\Filters;

use App\Services\Users\IUser;

interface IFilter
{
    /**
     * Returns true if the given user matches the filter conditions.
     * 
     * @param \App\Services\Users\IUser $user
     * @return bool
     */
    public function passes(IUser $user);

    /**
     * Sets the conditions to be met by this filter.
     * 
     * Will throw validation exceptions if the set conditions are invalid.
     * 
     * @param array $conditions
     * @return \App\Services\Filters\IFilter
     * @throws \Illuminate\Validation\ValidationException
     */
    public function setConditions(array $conditions);
}
