<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	// for mass assginment
	protected $fillable = [
		'user_id', 'postal_code', 'address1', 'address2', 'tel', 'fax',
	];

	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('my_user_config', function($builder) {
			$builder->where('user_id', auth()->id());
		});
	}

	/**
	  * 所属ユーザ
	  *
	  * @var array
	  *
	 */	
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
