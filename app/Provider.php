<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	  'name', 'address'
   ];

	/**
	 * Has many products
	 *
	 * @return void
	 */
	public function products()
	{
		return $this->hasMany('App\Product');
	}
}
