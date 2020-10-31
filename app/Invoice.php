<?php

namespace App;

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
	 * belongsToMany Products
	 *
	 * @return void
	 */
	public function products()
	{
		return $this->belongsToMany('App\Product')->withTimestamps();
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
}
