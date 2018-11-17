<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use Carbon\Carbon;

class Estimate extends Model
{
	const DEFAULT_TAX_RATE = '0.08';

	// for mass assignment
	protected $fillable = [
		'user_id', 'estimate_no', 'title', 'issue_date', 'due_date', 'customer_id',
		'effective_date', 'payment_term', 'customer_name', 'self_company_name',
		'self_postal_code', 'self_address1', 'self_address2', 'self_tel',
		'self_fax', 'tax_rate', 'remarks', 'submitted_flag',
	];

	protected $dates = [
		'issue_date',
		'due_date',
		'effective_date',
	];

	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('my_estimates', function($builder) {
			$builder->where('user_id', auth()->id());
		});
	}

	public function setRedundantData($user) {
		$now = Carbon::now();
		$now_str = $now->format('YmdHis');

		$customer = Customer::find($this->customer_id);
		$profile = Auth()->user()->profile()->first();

		$this->user_id = $user->id;
		$this->customer_name = $customer->name;
		$this->estimate_no = $now_str;
		$this->self_company_name = $profile->company_name;
		$this->self_postal_code = $profile->postal_code;
		$this->self_address1 = $profile->address1;
		$this->self_address2 = $profile->address2;
		$this->self_tel = $profile->tel;
		$this->self_fax = $profile->fax;
		$this->self_pic = Auth()->user()->id;

		$this->tax_rate = $this->tax_rate / 100;
	}

	public function calc_price($details)
	{
		$total_price = 0;

		foreach ($details as $detail) {
			$total_price += $detail->price;
		}
		return $total_price * (1 + $this->tax_rate);
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
