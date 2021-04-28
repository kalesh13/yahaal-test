<?php

namespace App\Services\Filters;

use App\Services\Users\IUser;
use Illuminate\Validation\Rule;

class GenderFilter extends BaseFilter implements IFilter
{
    /**
     * Returns true if the given user gender matches the `gender` field in the 
     * conditions.
     * 
     * @param \App\Services\Users\IUser $user
     * @param array $conditions
     * @return bool
     */
    public function passes(IUser $user, array $conditions = [])
    {
        $conditions = $conditions ?? $this->conditions;

        return $user->gender === $this->conditions['gender'];
    }

    /**
     * Returns the validation rules of this filter.
     * 
     * @return array
     */
    protected function validationRules()
    {
        return ['gender' => ['bail', 'required', Rule::in(['Male', 'Female'])]];
    }
}
