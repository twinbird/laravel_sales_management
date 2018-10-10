<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
		'name' => $faker->name,
		'standard_price' => $faker->numberBetween($min = 0.001, $max = 9999999999.999),
    ];
});
