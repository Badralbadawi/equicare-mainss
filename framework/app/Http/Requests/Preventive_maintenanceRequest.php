<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Preventive_maintenanceRequest extends FormRequest
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
//              'short_name' => "bail|required|max:5|alpha_num|unique:departments,short_name,$this->id,id,deleted_at,NULL",
        'clean_cooling_vents_and_filters' =>  'required|in:Pass,Fail,N/A',
        'Inspect_and_clean_ducts_heater_and_fans' =>  'required|in:Pass,Fail,N/A',
        'Inspect_gaskets_for_signs_of_deterioration' =>  'required|in:Pass,Fail,N/A',
        'Inspect_port_closures_and_port_sleeves' =>  'required|in:Pass,Fail,N/A',
        'Replace_battery_every_24_months' =>  'required|in:Pass,Fail,N/A',
        'Complete_model_specific_preventive_maintenance' =>  'required|in:Pass,Fail,N/A',
];
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
