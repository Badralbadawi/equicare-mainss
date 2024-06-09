<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class specifications extends Model {
	use SoftDeletes;
	protected $table = 'specifications';
	protected $guard_name = 'web';

	protected $fillable = ['name', 'Classes'];

	// public function equipments() {
	// 	return $this->hasMany('App\type_of_healthfacilitys', 'department');
	// }

}
