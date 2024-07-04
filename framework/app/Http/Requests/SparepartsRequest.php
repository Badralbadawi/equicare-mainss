<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SparepartsRequest extends FormRequest {
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
		$rules = [];

		if($this->request->spareParts=[]){

			foreach ($this->request->get('spareParts') as $key => $val) {
				$rules['SPARE_NO.' . $key] = 'required|numeric';
				$rules['spare_name.' . $key] = 'required';
				$rules['quantity.' . $key] = 'required|numeric';
				$rules['type_sp.' . $key] = 'required';
			}
		}
		else{
			$rules['SPARE_NO'] ='required|numeric';
			$rules['spare_name'] ='required';
			$rules['quantity'] ='required|numeric';
			$rules['type_sp'] ='required';
		}
		return $rules;

			// return [
			// 	'spare_name' => 'required',
			// 	'SPARE_NO' => 'required',
			// 	'quantity' => 'required',
			// 	'type_sp' => 'required',
				// 'item_id'=> 'required',
				// 'equipment_id'=> 'required',


	
				// 'name' => 'required',
		
		} 
		public function messages() {
			$messages = [];
			if ($this->spareParts) {
				foreach ($this->cost as $i => $v) {
					$messages['SPARE_NO.' . $i . '.numeric'] = 'SPARE_NO field is required';
					$messages['spare_name.' . $i . '.required'] = 'spare_name field is required';
					$messages['quantity.' . $i . '.numeric'] = 'quantity field is required';
					$messages['type_sp.' . $i . '.required'] = 'type_sp field is required';
				}
			}
			return $messages;
		}	
	}

