<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker)
{
	return [
	   'number'         => $faker->randomNumber(8),
	   'date'           => $faker->dateTimeThisYear($max = 'now', $timezone = null),
	   'subtotal'       => 0,
	   'discount_rate'  => 0,
	   'total'          => 0,
	   'payment_method' => $faker->randomElement(['cash', 'debit-card', 'credit-card', 'wire-transfer', 'bank-check']),
	   'client_id'      => $faker->numberBetween(1, 21),
	   'user_id'        => $faker->numberBetween(1, 21),
   ];
});
