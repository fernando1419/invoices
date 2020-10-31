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
}
