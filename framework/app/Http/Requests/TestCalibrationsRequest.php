<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestCalibrationsRequest extends FormRequest
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
            // 'name' => 'required',
 			// 'hospital' =>'required',
            // 'manufacturer' => 'required',
            // 'serial_number' => 'required',
            // 'number' => 'required',
            // 'model' => 'required',
            // 'location' => 'required',
            'technician' => 'required',
 			'test_type_incoming' =>'required',
            'post_repair' => 'required',
            'date' => 'required',
            // 'physical_condition' => 'required',
            // 'electrical_safety' => 'required',
            // 'preventive_maintenance' => 'required',
            // 'performance_testing' => 'required',
 			'governorate' =>'required',
            'directorate' => 'required',
//             'name' => 'required',
//             'name' => 'required',
//             'name' => 'required',
//             'name' => 'required',
//              'short_name' => "bail|required|max:5|alpha_num|unique:departments,short_name,$this->id,id,deleted_at,NULL",
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
