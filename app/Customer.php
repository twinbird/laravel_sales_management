<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // for mass assignment
	protected $fillable = [
		'name', 'address1', 'address2', 'tel', 'fax', 'payment_term',
	];

	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('my_customers', function($builder) {
			$builder->where('user_id', auth()->id());
		});
	}

	/**
	 * 所属するユーザ
	 *
	 * @var array
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
