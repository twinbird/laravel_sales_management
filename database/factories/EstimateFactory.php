<?php

use Faker\Generator as Faker;

$factory->define(App\Estimate::class, function (Faker $faker) {
    return [
		'estimate_no' => strval($faker->datetime->format('YmdHis')),
		'title' => $faker->sentence(), 
		'issue_date' => $faker->date(), 
		'due_date' => $faker->date(),
		'effective_date' => $faker->date(), 
		'payment_term' => $faker->sentence(), 
		'customer_name' => $faker->company, 
		'self_company_name' => $faker->company,
		'self_postal_code' => $faker->postcode, 
		'self_address1' => $faker->address, 
		'self_address2' => $faker->address, 
		'self_tel' => $faker->phoneNumber,
		'self_fax' => $faker->phoneNumber, 
		'self_pic' => $faker->name,
		'tax_rate' => $faker->randomDigit,
		'total_price' => $faker->randomDigit,
		'remarks' => $faker->text,
    ];
});
