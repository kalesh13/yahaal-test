<?php

namespace App\Services\Users;

class User implements IUser
{
    /**
     * Id of the user.
     * 
     * @var string
     */
    protected $id;

    /**
     * First name of the user.
     * 
     * @var string
     */
    protected $firstName;

    /**
     * First name of the user.
     * 
     * @var string
     */
    protected $lastName;

    /**
     * First name of the user.
     * 
     * @var string
     */
    protected $gender;

    /**
     * Latitude of user location
     * 
     * @var string
     */
    protected $lat;

    /**
     * Longitude of user location
     * 
     * @var string
     */
    protected $lon;

    public function __construct($id = '', $firstName = '', $lastName = '', $gender = '', $lat = '', $lon = '')
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->lat = $lat;
        $this->lon = $lon;
    }

    /**
     * Creates a new instance of the user from the given array.
     * 
     * @param array $data
     * @return static
     */
    public static function from(array $data)
    {
        // If $data contains `id` as a key, we are going to assume that the $data
        // is associative array with key
        if (in_array('id', array_keys($data))) {
            return new static(
                $data['id'],
                $data['first_name'],
                $data['last_name'],
                $data['gender'],
                $data['lat'],
                $data['lon']
            );
        }
        return new static(
            $data[0],
            $data[1],
            $data[2],
            $data[3],
            $data[4],
            $data[5]
        );
    }

    /**
     * Returns true if the user gender value is `Male`
     * 
     * @return bool
     */
    public function isMale()
    {
        return 'Male' === $this->gender;
    }

    /**
     * Returns true if the user gender value is `Female`
     * 
     * @return bool
     */
    public function isFemale()
    {
        return 'Female' === $this->gender;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'gender' => $this->gender,
            'lat' => $this->lat,
            'lon' => $this->lon,
        ];
    }

    /**
     * Magic method to get protected properties.
     * 
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->$key;
    }
}
