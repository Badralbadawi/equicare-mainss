<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentNameRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
		return auth()->check();
	}

	public function rules() {
		if ($this->id) {
			return [
				'name' => 'required',
				'sr_no' => 'required|regex:/^\S*$/',
				'code' => "bail|required|max:5|alpha_num|unique:equipmentsnames,code,$this->id,id,deleted_at,NULL",
			];
		} else {
			return [
				'name' => 'required',
				'code' => 'bail|required|max:5|alpha_num|unique:equipmentsnames,code,NULL,id,deleted_at,NULL',
			];

		}
	}
}
