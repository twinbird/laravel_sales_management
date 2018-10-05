<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
		'name' => $faker->company,
		'address1' => $faker->address,
		'address2' => $faker->address,
		'tel' => $faker->phoneNumber,
		'fax' => $faker->phoneNumber,
		'payment_term' => $faker->text,
    ];
});
