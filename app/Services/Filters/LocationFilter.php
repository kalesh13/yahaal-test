<?php

namespace App\Services\Filters;

use App\Services\Users\IUser;
use Illuminate\Validation\Rule;

class LocationFilter extends BaseFilter implements IFilter
{
    /**
     * Returns true if the given user latitude and longitude is within the range of this filter.
     * 
     * @param \App\Services\Users\IUser $user
     * @return bool
     */
    public function passes(IUser $user)
    {
        return $user->gender === $this->conditions['gender'];
    }

    /**
     * Returns the validation rules of this filter.
     * 
     * @return array
     */
    protected function validationRules()
    {
        return [
            'location' => ['bail', 'required', Rule::in(['London', 'Paris', 'Kansas City'])],
            'radius' => 'bail|required|integer|max:2000'
        ];
    }
}
