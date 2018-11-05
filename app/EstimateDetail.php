<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstimateDetail extends Model
{
	// for mass assignment
	protected $fillable = [
		'estimate_id', 'product_name', 'product_id',
		'unit_price', 'quantity', 'price',
	];

	protected static function boot()
	{
		parent::boot();
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
