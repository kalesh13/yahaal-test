<?php

namespace App\Services\Filters;

use Illuminate\Support\Facades\Validator;

abstract class BaseFilter implements IFilter
{
    /**
     * The conditions that has to be met by the filter.
     * 
     * @var array
     */
    protected $conditions;

    /**
     * Returns the validation rules of this filter.
     * 
     * @return array
     */
    protected abstract function validationRules();

    /**
     * Sets the conditions to be met by this filter.
     * 
     * Will throw validation exceptions if the set conditions are invalid.
     * 
     * @param array $conditions
     * @return \App\Services\Filters\IFilter
     * @throws \Illuminate\Validation\ValidationException
     */
    public function setConditions(array $conditions)
    {
        Validator::validate($conditions, $this->validationRules());

        $this->conditions = $conditions;

        return $this;
    }
}
