<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	// for mass assignment
	protected fillable = [
		'name', 'standard_price',
	];

	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('my_products', function($builder) {
			$builder->where('user_id', auth()->id());
		});
	}

	/**
	 * 所属ユーザ
	 *
	 * @var array
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
