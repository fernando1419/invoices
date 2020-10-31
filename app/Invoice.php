<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	  'number', 'date', 'subtotal', 'discount_rate', 'total', 'payment_method', 'client_id', 'user_id'
   ];

	/**
	 * getter for "date" attribute.
	 *
	 * @param [date] $date
	 * @return Carbon instance.
	 */
	public function getDateAttribute($date)
	{
		return Carbon::parse($date);
	}

	/**
	 * belongsToMany Products
	 *
	 * @return void
	 */
	public function products()
	{
		return $this->belongsToMany('App\Product')->withPivot('quantity', 'price')->withTimestamps();
	}

	/**
	 * belognsTo Client
	 *
	 * @return void
	 */
	public function client()
	{
		return $this->belongsTo('App\Client');
	}

	/**
	 * belognsTo User
	 *
	 * @return void
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
