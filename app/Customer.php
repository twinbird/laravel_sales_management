<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // for mass assignment
	protected $fillable = [
		'name', 'address1', 'address2', 'tel', 'fax', 'payment_term', 'user_id',
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

	/**
	 * 検索ワードでのフィルタ
	 *
	 * @var query
	 **/
	public function scopeSearchWordFilter($query, ?string $search_word)
	{
		if (is_null($search_word)) {
			return $query;
		}
		$query->where('name', 'like', '%' . $search_word . '%')
				->orWhere('address1', 'like', '%' . $search_word . '%')
				->orWhere('address2', 'like', '%' . $search_word . '%')
				->orWhere('tel', 'like', '%' . $search_word . '%')
				->orWhere('fax', 'like', '%' . $search_word . '%');
	}
}
