<?php

namespace App\Services\Filters;

use App\Services\Users\IUser;
use Illuminate\Validation\Rule;

class LocationFilter extends BaseFilter implements IFilter
{
    /**
     * Holds the central locations along with their latitude and longitude. Location name is
     * mapped to an array where first value is latitude and second is longitude.
     * 
     * @var array
     */
    protected $locations = [];

    /**
     * Returns true if the given user latitude and longitude is within the range of this filter.
     * 
     * @param \App\Services\Users\IUser $user
     * @return bool
     */
    public function passes(IUser $user)
    {
        return $this->isCordinatesWithinRadius(
            [$user->lat, $user->lon],
            $this->locations[$this->conditions['location']],
            $this->conditions['radius']
        );
    }

    /**
     * Distance between two latitudes are assumed to be 111Km (40,000/360).
     * 
     * @param array $cordinates The user cordinates array
     * @param array $centerCordinates The cordinates of the centre location
     * @param int $radius_in_km
     * 
     * @return bool
     */
    protected function isCordinatesWithinRadius(array $cordinates, array $centerCordinates, $radius_in_km)
    {
        $kms_betw_lats = 40000 / 360;
        $kms_betw_longs = cos(pi() * $centerCordinates[0] / 180) * $kms_betw_lats;

        $kms_bet_our_lat = $this->differenceBetweenDegrees($cordinates[0], $centerCordinates[0]) * $kms_betw_lats;
        $kms_bet_our_long = $this->differenceBetweenDegrees($cordinates[1], $centerCordinates[1]) * $kms_betw_longs;

        return sqrt(($kms_bet_our_lat * $kms_bet_our_lat) + ($kms_bet_our_long * $kms_bet_our_long)) <= $radius_in_km;
    }

    /**
     * If both the degrees are in same hemisphere, their absolute value has to be subtracted to find the distance
     * between them (in degree). If both cordinates are in different hemisphere, simply adding the absolute value 
     * of the degrees will get the distance between them (in degree)
     * 
     * @param int $first
     * @param int $second
     */
    protected function differenceBetweenDegrees($first, $second)
    {
        if (($first < 0 && $second < 0) || ($first > 0 && $second > 0)) {
            // In same hemisphere
            return abs(abs($first) - abs($second));
        }
        return abs($first) + abs($second);
    }

    /**
     * Adds a new center location to the filter.
     * 
     * @param string $name
     * @param float $latitude
     * @param float $longitude
     */
    public function addCenterLocations($name, $latitude, $longitude)
    {
        $this->locations[$name] = [$latitude, $longitude];

        return $this;
    }

    /**
     * Returns the validation rules of this filter.
     * 
     * @return array
     */
    protected function validationRules()
    {
        return [
            'location' => ['bail', 'required', Rule::in(array_keys($this->locations))],
            'radius' => 'bail|required|integer|max:2000'
        ];
    }
}
