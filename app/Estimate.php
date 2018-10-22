<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
	// for mass assignment
	protected $fillable = [
		'user_id', 'estimate_no', 'title', 'issue_date', 'due_date',
		'effective_date', 'payment_term', 'customer_name', 'self_company_name',
		'self_postal_code', 'self_address1', 'self_address2', 'self_tel',
		'self_fax', 'self_pic', 'tax_rate', 'total_price', 'remarks',
	];

	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('my_estimates', function($builder) {
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
	 * 見積明細
	 *
	 * @var array
	 **/
	public function estimates()
	{
		return $this->hasMany('App\EstimateDetail');
	}
}
