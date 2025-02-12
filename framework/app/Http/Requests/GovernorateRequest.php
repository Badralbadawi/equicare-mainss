<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GovernorateRequest extends FormRequest
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
				'short_name' => "bail|required|max:5|alpha_num|unique:governorates,short_name,$this->id,id,deleted_at,NULL",
			];
		} else {
			return [
				'name' => 'required',
				'short_name' => 'bail|required|max:5|alpha_num|unique:governorates,short_name,NULL,id,deleted_at,NULL',
			];

		}
	}
}
