<?php

namespace App\Services\Users;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Magic properties
 * 
 * @property string $id
 * @property string $firstName
 * @property string $lastName
 * @property string $gender
 * @property string $lat
 * @property string $lon
 */
interface IUser extends Arrayable
{
    /**
     * Returns true if the user gender value is `Male`
     * 
     * @return bool
     */
    public function isMale();

    /**
     * Returns true if the user gender value is `Female`
     * 
     * @return bool
     */
    public function isFemale();
}
