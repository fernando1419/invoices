<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker)
{
	return [
	   'name'         => $faker->unique()->word,
	   'trademark'    => $faker->sentence(2),
	   'due_date'     => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 year', $timezone = null)->format('Y-m-d'),
	   'unit_price'   => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 10000), // 148.89
	   'stock'        => $faker->numberBetween($min = 1000, $max = 9000),
	   'provider_id'  => $faker->numberBetween(1, 10),
	];
});
