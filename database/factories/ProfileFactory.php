<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
		'company_name' => $faker->name,
		'postal_code' => $faker->postcode,
		'address1' => $faker->address,
		'address2' => $faker->address,
		'tel' => $faker->phoneNumber,
		'fax' => $faker->phoneNumber,
    ];
});
