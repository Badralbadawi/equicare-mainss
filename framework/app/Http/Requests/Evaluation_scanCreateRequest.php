<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Evaluation_scanCreateRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
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
			'equip_id' => 'required',
			// 'call_handle' => 'required',
			'report_no' => 'required_if:call_handle,==,external',
			// 'call_register_date_time' => 'required|date',
			// 'next_due_date' => 'date|after:call_register_date_time',
			'working_status' => 'required',
			// 'nature_of_problem' => 'required',
			// 'code_error'=> 'required',
			// 'remarks'=> 'required',
			 'evaluation_scan_date_time'=> 'required',
			'equipment_stops_date_time'=> 'required',
			'reasons_stopping'=> 'required',
			 'assess_equipment'=> 'required',
			// ''=> 'required',
			// ''=> 'required'


		];
	}
	public function messages() {
		return [
			'equip_id.required' => 'The Unique id field is required.',

		];
	}
}
