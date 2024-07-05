<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
                'adress' => 'required',
                'phone_no' => 'required',
				'email' => 'required',
			];
			 
		}
	
}
