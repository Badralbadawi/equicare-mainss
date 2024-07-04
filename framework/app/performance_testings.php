<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Performance_testings extends Model
{
    protected $table = 'performance_testing';
	protected $guard_name = 'web';

    protected $fillable = [
        'verifies_battery_operation',
        'fan_operation',
        'warm_up_time',
        'air_temperature_accuracy',
        'skin_temperature_accuracy',
        'temperature_overshoot',
        'relative_humidity',
        'air_flow',
        'air_temperature_alarms',
        'skin_temperature_alarms',
        'high_temperature_protection',
        'noiseClassification',
        'noiseLevel',

        // 'normal_noise_level',
        // 'alarm_noise_level_low',
        // 'alarm_noise_level_high',
        'alarm_function',
        'complete_model_testing',    ];
// 	public function equipments() {
// 		return $this->hasMany('App\specification', 'department');
// 	}
	 
}
