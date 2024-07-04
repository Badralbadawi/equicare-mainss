<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Electrical_safetysRequest extends FormRequest
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
'ground_wire_resistance' => 'required|numeric|between:0,99.99',
'ground_wire_resistance_result' => 'required|string|max:255',
'chassis_leakage' => 'required|numeric|between:0,100.1000',
'chassis_leakage_result' => 'required|string|max:255',
'patient_leakage_current' => 'required|numeric|between:0,99.99',
'patient_leakage_current_result' => 'required|string|max:255',        ,
        'ground_wire_presence' =>  'required|in:Pass,Fail,N/A',

        'ground_to_neutral_voltage' => 'required|in:Pass,Fail,N/A',

        'ground_to_line_voltage' =>  'required|in:Pass,Fail,N/A',

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
