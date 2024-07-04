<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Physical_conditionsRequest extends FormRequest
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
'device_clean_decontaminated' => 'required|in:Pass,Fail,N/A',
'no_physical_damage' => 'required|in:Pass,Fail,N/A',
'switches_controls_operable' => 'required|in:Pass,Fail,N/A',
'display_intensity_adequate' => 'required|in:Pass,Fail,N/A',
'control_labeling_present' => 'required|in:Pass,Fail,N/A',
'hoses_inlets_available' => 'required|in:Pass,Fail,N/A',
'power_cord_accessories_intact' => 'required|in:Pass,Fail,N/A',
'filters_vents_clean' => 'required|in:Pass,Fail,N/A',
'test_result' => 'required|in:Pass,Fail,N/A',
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
