<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Physical_conditions extends Model
{
    protected $table = 'physical_conditions';
	protected $guard_name = 'web';

	protected $fillable = [
        'device_clean_decontaminated',
        'no_physical_damage',
        'switches_controls_operable',
        'display_intensity_adequate',
        'control_labeling_present',
        'hoses_inlets_available',
        'power_cord_accessories_intact',
        'filters_vents_clean',
        'test_result',
    ];
// 	public function equipments() {
// 		return $this->hasMany('App\specification', 'department');
// 	}
	 
}
