<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Type extends Model
{
    protected $table = 'vehicle_type';

    /**
     * Get the transportation data for a vehicle type
     */
    public function transportation()
    {
        return $this->hasMany('App\Transportation');
    }

    /**
	 * Get the Created At with specified date format
	 *
	 * @param integer
	 * @return string
	 */
    public function getCreatedAtAttribute($value)
  	{
      	return date("d M Y H:i:s", strtotime($value));
  	}

    /**
	 * Get the Created By with specified name based on User ID
	 *
	 * @return string
	 */
    public function getCreatedByAttribute($value)
  	{
        return User::find($value)->name;
  	}

	/**
	 * Get the Updated At with specified date format
	 *
	 * @param integer
	 * @return string
	 */
    public function getUpdatedAtAttribute($value)
  	{
      	return date("d M Y H:i:s", strtotime($value));
  	}

    /**
	 * Get the Updated By with specified name based on User ID
	 *
	 * @return string
	 */
    public function getUpdatedByAttribute($value)
  	{
        return User::find($value)->name;
  	}
}
