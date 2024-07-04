<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Tests_equpRequest extends FormRequest {

	public function authorize() {
		return auth()->check();
	}

	public function rules() {
		if ($this->id) {
			return [
				'equip_id' => ['required', 'integer', 'exists:equipment,id'],
				'stage1_test1_status' => ['required', 'string', 'in:pending,passed,failed'],
				'stage1_test2_description' => ['required', 'string'],
				'stage2_test1_status' => ['required', 'string', 'in:pending,passed,failed'],
				'stage2_test2_description' => ['required', 'string'],
				'stage3_test1_status' => ['required', 'string', 'in:pending,passed,failed'],
				'stage3_test2_description' => ['required', 'string'],
				'stage4_test1_status' => ['required', 'string', 'in:pending,passed,failed'],
				'stage4_test2_description' => ['required', 'string'],		
				];
		} else {
			return [
				// 'name' => 'required',
				// 'short_name' => 'bail|required|max:5|alpha_num|unique:departments,short_name,NULL,id,deleted_at,NULL',
			];

		}
	}
}
