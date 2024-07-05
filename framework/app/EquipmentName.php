<?php

namespace App\Models;
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class EquipmentName extends Model
{
    use SoftDeletes;
	protected $table = 'equipmentsnames';
	protected $guard_name = 'web';

	protected $fillable = ['name', 'code','sr_no',];

	// public function equipments() {
	// 	return $this->hasMany('App\Equipment', 'department');
	// }
 
}