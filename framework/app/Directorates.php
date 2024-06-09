<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Directorates extends Model {
	use SoftDeletes;
	protected $table = 'Directorates';
	protected $guard_name = 'web';

	protected $fillable = ['name'];

	// public function get_governorate() {
	// 	return $this->belongsTo('App\Governorate', 'id_governorate')->withTrashed();
	// }


}
