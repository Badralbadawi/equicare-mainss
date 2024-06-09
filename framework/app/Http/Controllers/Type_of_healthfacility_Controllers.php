<?php

namespace App\Http\Controllers;

use App\Type_of_healthfacility;
use App\Http\Requests\Type_of_healthfacilityRequest;


class Type_of_healthfacility_Controllers extends Controller {

	public function index() {
		$this->availibility('View type_of_healthfacility');
		$data['page'] = 'type_of_healthfacility';
		$data['type_of_healthfacility'] = Type_of_healthfacility::all();
		return view('type_of_healthfacility.index', $data);
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
		$this->availibility('Create type_of_healthfacility');
		$data['page'] = 'type_of_healthfacility';
		return view('type_of_healthfacility.create', $data);
	}

	public function store(Type_of_healthfacilityRequest $request) {
		$type_of_healthfacility = new Type_of_healthfacility;
		$type_of_healthfacility->name = $request->name;
		$type_of_healthfacility->short_name = $request->short_name;
		$type_of_healthfacility->save();

		return redirect()->route('type_of_healthfacility.index')
			->with('flash_message',
				'type_of_healthfacility "' . $type_of_healthfacility->name . '" Created!');
	}

	public function edit($id) {
		$this->availibility('Edit type_of_healthfacility');
		$data['page'] = 'type_of_healthfacility';
		$data['type_of_healthfacility'] = Type_of_healthfacility::findOrFail($id);
		return view('type_of_healthfacility.edit', $data);
	}

	public function update(Type_of_healthfacilityRequest $request, $id) {
		$type_of_healthfacility = Type_of_healthfacility::findOrFail($id);
		$type_of_healthfacility->name = $request->name;
		$type_of_healthfacility->short_name = $request->short_name;
		$type_of_healthfacility->save();

		return redirect()->route('type_of_healthfacility.index')
			->with('flash_message',
				'type_of_healthfacility "' . $type_of_healthfacility->name . '" updated!');
	}

	public function destroy($id) {
		$this->availibility('Delete type_of_healthfacility');
		$type_of_healthfacility = Type_of_healthfacility::findOrFail($id);
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
			$check = Type_of_healthfacility::where('short_name', $yourString)->first();

			if (is_null($check)) {
				return $yourString;
			}
			$only_one_word = substr($yourString, 0, 1);
			$only_one_word .= substr($yourString, 1, 1);
			$check = Type_of_healthfacility::where('short_name', $only_one_word)->first();
		} else {
			$words = explode(" ", $yourString);
			$first_char_after_space = substr($words[0], 0, 1);
			$first_char_after_space .= substr($words[1], 0, 1);
			if (array_key_exists(2, $words)) {
				$first_char_after_space .= substr($words[2], 0, 1);
			}
			$check_first_two_char_of_words = Type_of_healthfacility::where('short_name', $first_char_after_space)->first();
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
					$check_first_two_char = Type_of_healthfacility::where('short_name', $first_char)->first();

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