<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreventiveMaintenance extends Model
{
    protected $table = 'Preventive_maintenances';
	protected $guard_name = 'web';

    protected $fillable = [
        'clean_cooling_vents_and_filters',
        'Inspect_and_clean_ducts_heater_and_fans',
        'Inspect_gaskets_for_signs_of_deterioration',
        'Inspect_port_closures_and_port_sleeves',
        'Replace_battery_every_24_months',
        'Complete_model_specific_preventive_maintenance'
    ];
// 	public function equipments() {
// 		return $this->hasMany('App\specification', 'department');
// 	}
	 
}
