<?php

namespace App\Services\Filters;

use \Illuminate\Support\Str;
use App\Services\Users\IUser;

class NameFilter extends BaseFilter implements IFilter
{
    /**
     * Returns true if the first character of the `firstName` or `lastName` of the
     * user matches the conditions of this filter.
     * 
     * @param \App\Services\Users\IUser $user
     * @return bool
     */
    public function passes(IUser $user)
    {
        return Str::startsWith($user->firstName, $this->conditions['character']) ||
            Str::startsWith($user->lastName, $this->conditions['character']);
    }

    /**
     * Returns the validation rules of this filter.
     * 
     * @return array
     */
    protected function validationRules()
    {
        return ['character' => 'bail|required|size:1'];
    }
}
