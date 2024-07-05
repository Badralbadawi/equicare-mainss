<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccessoriesRequest extends FormRequest
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
				'quantity_ac' => 'required',
				'piece_number' => 'required',
				'code_ac' => "bail|required|max:5|alpha_num|unique:accessories,code_ac,$this->id,id,deleted_at,NULL",
			];
		} else {
			return [
				'name' => 'required',
				'code_ac' => 'bail|required|max:5|alpha_num|unique:accessories,code_ac,NULL,id,deleted_at,NULL',
			];

		}
	}
}
