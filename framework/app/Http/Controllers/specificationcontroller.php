<?php

namespace App\Http\Controllers;

use App\type_of_healthfacility;
use App\Http\Requests\SpecificationRequest;
use App\specifications;

class SpecificationControllers extends Controller {

	public function index() {
		$this->availibility('View Specifications');
		$data['page'] = 'Specifications';
		$data['Specifications'] = specifications::all();
		return view('Specifications.index', $data);
	}
	public static function availibility($method)
    {

    // $r_p = \Auth::user()->getPermissionsViaRoles()->pluck('name')->toArray();
			if (\Auth::user()->hasDirectPermission($method)) {
				return true;
			} else {
				abort('401');
			}

        // if (\Auth::user()->hasDirectPermission($method)) {

        //     return true;
        // } elseif (!in_array($method, $r_p)) {
        //     abort('401');
        // } else {
        //     return true;
        // }
    }

	public function create() {
		$this->availibility('Create Specifications');
		$data['page'] = 'Specifications';
		return view('Specifications.create', $data);
	}

	public function store(SpecificationRequest $request) {
		$specifications = new Specifications;
		$specifications->name = $request->name;
		$specifications->short_name = $request->short_name;
		$specifications->save();

		return redirect()->route('Specifications.index')
			->with('flash_message',
				'Specifications "' . $specifications->name . '" Created!');
	}

	public function edit($id) {
		$this->availibility('Edit Specifications');
		$data['page'] = 'Specifications';
		$data['Specifications'] = specifications::findOrFail($id);
		return view('Specifications.edit', $data);
	}

	public function update(SpecificationRequest $request, $id) {
		$specifications = Specifications::findOrFail($id);
		$specifications->name = $request->name;
		$specifications->short_name = $request->short_name;
		$specifications->save();

		return redirect()->route('type_of_healthfacility.index')
			->with('flash_message',
				'type_of_healthfacility "' . $specifications->name . '" updated!');
	}

	public function destroy($id) {
		$this->availibility('Delete type_of_healthfacility');
		$type_of_healthfacility = type_of_healthfacility::findOrFail($id);
		$type_of_healthfacility->delete();

		return redirect()->route('type_of_healthfacility.index')
			->with('flash_message',
				'type_of_healthfacility "' . $type_of_healthfacility->name . '" deleted!');
	}

	public static function recursive($yourString) {
		$result = "";
		if (strpos($yourString, " ") === false) {
			$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
				" ", "-", "_");
			$yourString = str_replace($vowels, "", $yourString);
			$check = type_of_healthfacility::where('short_name', $yourString)->first();

			if (is_null($check)) {
				return $yourString;
			}
			$only_one_word = substr($yourString, 0, 1);
			$only_one_word .= substr($yourString, 1, 1);
			$check = type_of_healthfacility::where('short_name', $only_one_word)->first();
		} else {
			$words = explode(" ", $yourString);
			$first_char_after_space = substr($words[0], 0, 1);
			$first_char_after_space .= substr($words[1], 0, 1);
			if (array_key_exists(2, $words)) {
				$first_char_after_space .= substr($words[2], 0, 1);
			}
			$check_first_two_char_of_words = type_of_healthfacility::where('short_name', $first_char_after_space)->first();
			if ($check_first_two_char_of_words == "") {
				$result = $first_char_after_space;
			}
			if ($result == "") {
				$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ", "-", "_");
				$yourString = str_replace($vowels, "", $yourString);
				$count = 1;
				for ($i = 1; $i <= strlen($yourString); $i++) {
					$first_char = substr($yourString, 0, 1);
					$first_char .= substr($yourString, $i, 1);
					$check_first_two_char = type_of_healthfacility::where('short_name', $first_char)->first();

					if ($count < strlen($yourString)) {
						if ($check_first_two_char == "") {
							$result = $first_char;
							break;
						}
					}

					$count++;
				}
			}
		}
		return $result;
	}

}