<?php

use Faker\Generator as Faker;

$factory->define(App\EstimateDetail::class, function (Faker $faker) {
    return [
		'product_name' => $faker->name,
		'quantity' => $faker->randomDigit,
		'unit_price' => $faker->randomFloat,
		'price' => $faker->randomFloat,
    ];
});
