<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PieceRequest extends FormRequest
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
		 
			return [
				'name' => 'required',
                'type_pi' => 'required',
                'numper_pi' => 'required',
				'code_pi' => "bail|required|max:5|alpha_num|unique:pieces,code_pi,$this->id,id,deleted_at,NULL",
                'quantity_pi' => 'required'];
			 
		}
	
}
