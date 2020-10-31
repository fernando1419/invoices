<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name', 'last_name', 'dni', 'birth_date', 'credit_card_number'
   ];

	public function getFullNameAttribute(): string
	{
		return "{$this->last_name}, {$this->first_name}";
	}

	/**
	 * HasMany Invoices
	 *
	 * @return void
	 */
	public function invoices()
	{
		return $this->hasMany('App\Invoice');
	}
}
