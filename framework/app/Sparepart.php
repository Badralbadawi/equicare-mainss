<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sparepart extends Model {
	use SoftDeletes;
	protected $table = 'spareparts';
	protected $guard_name = 'web';

	protected $fillable = ['spare_name', 'item_id','equipment_id','quantity','SPARE_NO','type_sp'];

	// public function equipments() {
	// 	return $this->hasMany('App\Equipment', 'department');
	// }

}
