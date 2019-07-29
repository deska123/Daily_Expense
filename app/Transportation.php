<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $table = 'transportation';

    /**
     * Get the Vehicle Type that owns the Transportation.
     */
    public function vehicleType()
    {
        return $this->belongsTo('App\Vehicle_Type', 'vehicleTypeId');
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
