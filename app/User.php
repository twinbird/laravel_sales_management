<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	 * 顧客へのリレーション
	 *
	 * @var array
	 */
	public function customers()
	{
		return $this->hasMany('App\Customer');
	}

	/**
	 * 商品へのリレーション
	 *
	 * @var array
	 */
	public function products()
	{
		return $this->hasMany('App\Product');
	}

	/**
	 * 設定情報へのリレーション
	 *
	 * @var Profile
	 */
	public function profile()
	{
		return $this->hasOne('App\Profile');
	}

	/**
	 * 見積
	 *
	 * @var array
	 **/
	public function estimates()
	{
		return $this->hasMany('App\Estimate');
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
