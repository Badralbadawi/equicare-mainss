<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SparepartsRequest extends FormRequest {

	public function authorize() {
		return auth()->check();
	}

	public function rules() {
			return [
				'spare_name' => 'required',
				'SPARE_NO' => 'required',
				'quantity' => 'required',
				'type_sp' => 'required',
				// 'item_id'=> 'required',
				// 'equipment_id'=> 'required',


	
				// 'name' => 'required',
				// 'short_name' => "bail|required|max:5|alpha_num|unique:departments,short_name,$this->id,id,deleted_at,NULL",
			];
		} 
	}

