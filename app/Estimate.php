<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class Estimate extends Model
{
	// for mass assignment
	protected $fillable = [
		'user_id', 'estimate_no', 'title', 'issue_date', 'due_date',
		'effective_date', 'payment_term', 'customer_name', 'self_company_name',
		'self_postal_code', 'self_address1', 'self_address2', 'self_tel',
		'self_fax', 'self_pic', 'tax_rate', 'total_price', 'remarks',
	];

	protected $dates = [
		'issue_date',
	];

	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('my_estimates', function($builder) {
			$builder->where('user_id', auth()->id());
		});

		/*
		 * before saving
		 */
		self::saving(function($model)
		{
			$now = new DateTime;
			$now_str = $now->format('YmdHis');

			$//customer = Customer::find($model->customer_id);
			$profile = Auth()->user()->profile();

			//$model->customer_name = $customer->name;
			$model->estimate_no = $now_str;
			$model->self_company_name = $profile->company_name;
			$model->self_postal_code = $profile->postal_code;
			$model->self_address1 = $profile->address1;
			$model->self_address2 = $profile->address2;
			$model->self_tel = $profile->tel;
			$model->self_fax = $profile->fax;

			// TODO
			$model->total_price = 0;
			$model->tax_rate = 0.0;
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
	 * 顧客
	 *
	 * @var Customer
	 **/
	public function customer()
	{
		return $this->belongsTo('App\Customer');
	}

	/**
	 * 見積明細
	 *
	 * @var array
	 **/
	public function estimate_details()
	{
		return $this->hasMany('App\EstimateDetail');
	}
}
