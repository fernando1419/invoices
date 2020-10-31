<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'trademark', 'due_date', 'unit_price', 'provider_id'];

	/**
	 * Validation rules
	 */
	protected static $rules = [
	   'name'        => 'required|min:3|max:255',
	   'trademark'   => 'required|min:3|max:255',
	   'due_date'    => 'required|date|after_or_equal:today',
	   'unit_price'  => 'required|numeric|gt:0',
	   'provider_id' => 'required',
   ];

	/**
	 * Getter for Product rules
	 *
	 * @return void
	 */
	public static function getValidationRules()
	{
		return static::$rules;
	}

	/**
	 * belongsTo a provider
	 *
	 * @return void
	 */
	public function provider()
	{
		return $this->belongsTo('App\Provider');
	}

	/**
	 * belongsToMany Invoices
	 *
	 * @return void
	 */
	public function invoices()
	{
		return $this->belongsToMany('App\Invoice')->withPivot('quantity', 'price')->withTimestamps();
	}
}
