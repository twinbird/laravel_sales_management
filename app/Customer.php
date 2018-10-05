<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // for mass assignment
	protected $fillable = [
		'name', 'address1', 'address2', 'tel', 'fax', 'payment_term',
	];
}
