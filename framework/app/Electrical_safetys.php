<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Electrical_safetys extends Model
{
    protected $table = 'electrical_safety';
	protected $guard_name = 'web';

    protected $fillable = [
        'ground_wire_resistance',
        'ground_wire_resistance_result',
        'chassis_leakage',
        'chassis_leakage_result',
        'patient_leakage_current',
        'patient_leakage_current_result',
        'ground_wire_presence',
        'ground_to_neutral_voltage',
        'ground_to_line_voltage',
    ];
// 	public function equipments() {
// 		return $this->hasMany('App\specification', 'department');
// 	}
	 
}
