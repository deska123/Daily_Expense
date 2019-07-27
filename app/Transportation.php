<?php

namespace App;

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
}
