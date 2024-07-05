<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Type_of_healthfacilityRequest extends FormRequest {

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
				'name' => 'required',
				'category'=> 'required',
				'short_name' => "bail|required|max:5|alpha_num|unique:departments,short_name,$this->id,id,deleted_at,NULL",
              ];
   }

	// public function rules() {
	// 	if ($this->id) {
	// 		return [
	// 			'name' => 'required',
	// // 			// ''=> '',
	//            'specification'=> 'required',
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
