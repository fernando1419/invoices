<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker)
{
	return [
	   'first_name'         => $faker->firstName,
	   'last_name'          => $faker->lastName,
	   'dni'                => $faker->randomNumber(8),
	   'birth_date'         => $faker->date(),
	   'credit_card_number' => $faker->creditCardNumber,
   ];
});
