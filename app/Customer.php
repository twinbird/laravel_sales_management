<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // for mass assignment
	protected $fillable = [
		'name', 'address1', 'address2', 'tel', 'fax', 'payment_term',
	];

	/**
	 * 所属するユーザ
	 *
	 * @var array
	 */
	public function user() {
		return $this->belongsTo('App\User');
	}
}
