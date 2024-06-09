<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecificationRequest extends FormRequest {

	public function authorize() {
		return auth()->check();
	}

	public function rules() {
		if ($this->id) {
			return [
				'name' => 'required',
				// ''=> '',
				'Classes' => "bail|required|max:5|alpha_num|unique:departments,short_name,$this->id,id,deleted_at,NULL",
			];
		} else {
			return [
				'name' => 'required',
				// ''=> '',
				'Classes' => 'bail|required|max:5|alpha_num|unique:departments,short_name,NULL,id,deleted_at,NULL',
			];

		}
	}
}
