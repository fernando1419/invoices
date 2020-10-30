<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name', 'last_name', 'dni', 'file', 'birth_date', 'email', 'password'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
   ];

	/**
	 * Setter to encrypt user password.
	 *
	 * @param mixed $value password in plain text.
	 */
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = bcrypt($value);
	}

	/**
	 * Validation rules for User Model
	 *
	 * @param mixed $ignoreId Id to Ignore on update requests.
	 * @return void
	 */
	protected static function rules($ignoreId = null)
	{
		return [
		 'first_name'              => 'required|min:2',
		 'last_name'               => 'required|min:2',
		 'dni'                     => 'required|digits_between:6,8',
		 'file'                    => 'required|min:2',
		 'birth_date'              => 'required|date|before:today',
		 'email'                   => 'bail|required|email|unique:users,email' . ( ! is_null($ignoreId) ? ",{$ignoreId}" : null),
		 'password'                => 'confirmed|min:6|required_with:password_confirmation' . (is_null($ignoreId) ? '|required' : '|sometimes|nullable'), // required on insert and option on update
		 'password_confirmation'   => 'sometimes|required_with:password',
	  ];
	}
}
