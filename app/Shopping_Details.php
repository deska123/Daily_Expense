<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Shopping_Details extends Model
{
    protected $table = 'shopping_details';

   /**
    * Get the goods that own the shopping_details.
    */
    public function good()
    {
      return $this->belongsTo('App\Goods', 'goodsId');
    }

    /**
     * Get the shop that owns the shopping_details.
     */
     public function shop()
     {
       return $this->belongsTo('App\Shops', 'shopsId');
     }

   /**
    * Get the shopping that owns the shopping_details.
    */
    public function shopping()
    {
      return $this->belongsTo('App\Shopping', 'shoppingId');
    }

  /**
    * Get price of each good
    */
    public function getGoodPrice()
    {
      return $this->good->price;
    }

    /**
	 * Get the Created At with specified date format
	 *
	 * @param integer
	 * @return string
	 */
    public function getCreatedAtAttribute($value)
  	{
      	return date("d F Y H:i:s", strtotime($value));
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
      	return date("d F Y H:i:s", strtotime($value));
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
