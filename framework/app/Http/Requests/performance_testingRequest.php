<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Performance_testingRequest extends FormRequest
{
    // public function authorize() {
	// 	return auth()->check();
	// }
   public function authorize() {
    return true;
}

/**
 * Get the validation rules that apply to the request.
 *
 * @return array
 */
public function rules() {

    return [     
        // 'verifies_battery_operation' => 'required|in:Pass,Fail,N/A',
        // 'fan_operation' => 'required|in:Pass,Fail,N/A',
        // 'warm_up_time' => 'required|in:Pass,Fail,N/A',
        // 'air_temperature_accuracy' => 'required|in:Pass,Fail,N/A',
        // 'skin_temperature_accuracy' => 'required|in:Pass,Fail,N/A',
        // 'temperature_overshoot' => 'required|in:Pass,Fail,N/A',
        // 'relative_humidity' => 'required|in:Pass,Fail,N/A',
        // 'air_flow' => 'required|in:Pass,Fail,N/A',
        // 'air_temperature_alarms' => 'required|in:Pass,Fail,N/A',
        // 'skin_temperature_alarms' => 'required|in:Pass,Fail,N/A',
        // 'high_temperature_protection' => 'required|in:Pass,Fail,N/A',
        // 'noiseClassification' => 'required|string',
        // 'noiseLevel' => 'required|numeric|between:0,99.99',
        // 'alarm_function' => 'required|in:Pass,Fail,N/A',
        // 'complete_model_testing' => 'required|in:Pass,Fail,N/A',
    //       'verifies_battery_operation',
    // 'fan_operation',
    // 'warm_up_time',
    // 'air_temperature_accuracy',
    // 'skin_temperature_accuracy',
    // 'temperature_overshoot',
    // 'relative_humidity',
    // 'air_flow',
    // 'air_temperature_alarms',
    // 'skin_temperature_alarms',
    // 'high_temperature_protection',
    // 'noiseClassification ',
    // 'noiseLevel ',

    // 'alarm_function',
    // 'complete_model_testing'
];
//              'short_name' => "bail|required|max:5|alpha_num|unique:departments,short_name,$this->id,id,deleted_at,NULL",
}

 // public function rules() {
 // 	if ($this->id) {
 // 		return [
 // 			'name' => 'required',
 // 			// ''=> '',
 // 			'short_name' => "bail|required|max:5|alpha_num|unique:departments,short_name,$this->id,id,deleted_at,NULL",
 // 		];
 // 	} else {
 // 		return [
 // 			'name' => 'required',
 // 			// ''=> '',
 // 			'short_name' => 'bail|required|max:5|alpha_num|unique:departments,short_name,NULL,id,deleted_at,NULL',
 // 		];

 // 	}
 // }
}
