<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstimateDetail extends Model
{
	// for mass assignment
	protected $fillable = [
		'user_id', 'estimate_id', 'product_name',
		'unit_price', 'quantity', 'price',
	];

	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('my_estimate_details', function($builder) {
			$builder->where('user_id', auth()->id());
		});
	}

	/**
	 * 所属ユーザ
	 *
	 * @var array
	 **/
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * 見積
	 *
	 * @var Estimate
	 **/
	public function estimate()
	{
		return $this->belongsTo('App\Estimate');
	}

}
