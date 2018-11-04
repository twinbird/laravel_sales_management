<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use Carbon\Carbon;

class Estimate extends Model
{
	// for mass assignment
	protected $fillable = [
		'user_id', 'estimate_no', 'title', 'issue_date', 'due_date', 'customer_id',
		'effective_date', 'payment_term', 'customer_name', 'self_company_name',
		'self_postal_code', 'self_address1', 'self_address2', 'self_tel',
		'self_fax', 'tax_rate', 'remarks', 'submitted_flag',
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
			$now = Carbon::now();
			$now_str = $now->format('YmdHis');

			$customer = Customer::find($model->customer_id);
			$profile = Auth()->user()->profile()->first();

			$model->customer_name = $customer->name;
			$model->estimate_no = $now_str;
			$model->self_company_name = $profile->company_name;
			$model->self_postal_code = $profile->postal_code;
			$model->self_address1 = $profile->address1;
			$model->self_address2 = $profile->address2;
			$model->self_tel = $profile->tel;
			$model->self_fax = $profile->fax;
			$model->self_pic = Auth()->user()->id;

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

	/**
	 * 検索フィルタ
	 *
	 **/
	public function scopeSearchWordFilter($query, ?string $search_word)
	{
		if (is_null($search_word)) {
			return $query;
		}
		$query->where('title', 'like', '%' . $search_word . '%')
				->orWhere('customer_name', 'like', '%' . $search_word . '%');
	}
}
