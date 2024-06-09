<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type_of_healthfacility extends Model {
	use SoftDeletes;
	protected $table = 'type_of_healthfacility';
	protected $guard_name = 'web';

	protected $fillable = ['name','short_name'];

// 	public function equipments() {
// 		return $this->hasMany('App\specification', 'department');
// 	}
	public function hospital() {
		return $this->hasMany('App\Hospital', 'type_of_healthfacility');
	}
}
