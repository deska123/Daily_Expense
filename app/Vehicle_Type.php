<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_Type extends Model
{
    protected $table = 'vehicle_type';

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
	 * Get the Updated At with specified date format
	 *
	 * @param integer
	 * @return string
	 */
    public function getUpdatedAtAttribute($value)
  	{
      	return date("d M Y H:i:s", strtotime($value));
  	}
}
