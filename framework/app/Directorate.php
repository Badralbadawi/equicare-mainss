<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Directorate extends Model {
	use SoftDeletes;
	protected $table = 'directorates';
	protected $guard_name = 'web';

	protected $fillable = ['name','short_name','governorate_id'];

	public function governorate() {
		return $this->belongsTo('App\Governorate','governorate_id')->withTrashed();
	}
	public function  hospital() {
		return $this->hasMany('App\Hospital', 'directorate_id');
	}
	// public function getUniqueIdAttribute($value) {
	// 	$uid = explode('/', $value);
	// 		$governorate = Governorate::find($uid[0]);
	// 		if (is_null($governorate)) {
	// 			return $value;
	// 		}
	// 		$uid[0] = $governorate->short_name;
	// 		$uid = implode('/', $uid);
	// 		return $uid;
	// 	}
}
