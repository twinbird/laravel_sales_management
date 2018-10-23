<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	// for mass assignment
	protected $fillable = [
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

	/**
	 * 商品名によるフィルタ
	 *
	 * @var query
	 **/
	public function scopeNameFilter($query, ?string $name)
	{
		if (is_null($name)) {
			return $query;
		}
		return $query->where('name', 'like', '%' . $name . '%');
	}

	/**
	 * 標準単価の最大価格によるフィルタ
	 *
	 * @var query
	 **/
	public function scopeMaxStandardPriceFilter($query, ?string $max_price)
	{
		if (is_null($max_price)) {
			return $query;
		}
		$val = floatval($max_price);
		return $query->where('standard_price', '<=', $val);
	}

	/**
	 * 標準単価の最小価格によるフィルタ
	 *
	 * @var query
	 **/
	public function scopeMinStandardPriceFilter($query, ?string $min_price)
	{
		if (is_null($min_price)) {
			return $query;
		}
		$val = floatval($min_price);
		return $query->where('standard_price', '>=', $val);
	}
}
