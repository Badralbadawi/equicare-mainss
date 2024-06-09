<?php

namespace App\Http\Controllers;
use App\Governorate;

use Illuminate\Http\Request;
use App\Http\Requests\GovernorateRequest;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
		$this->availibility('View Governorates');
		$data['page'] = 'governorates';
		$data['governorates'] = Governorate::all();
		return view('governorates.index', $data);
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
		$this->availibility('Create Governorates');
		$data['page'] = 'governorates';
		return view('governorates.create', $data);
	}

	public function store(GovernorateRequest $request) {
		$governorate = new Governorate;
		$governorate->name = $request->name;
		$governorate->short_name = $request->short_name;
		$governorate->save();

		return redirect()->route('governorates.index')
			->with('flash_message',
				'Governorate "' . $governorate->name . '" Created!');
	}

	public function edit($id) {
		// $this->availibility('Edit Governorates');
		$data['page'] = 'governorates';
		$data['governorate'] = Governorate::findOrFail($id);
		return view('governorates.edit', $data);
	}

	public function update(GovernorateRequest $request, $id) {
		$governorate = Governorate::findOrFail($id);
		$governorate->name = $request->name;
		$governorate->short_name = $request->short_name;
		$governorate->save();

		return redirect()->route('governorates.index')
			->with('flash_message',
				'Governorate "' . $governorate->name . '" updated!');
	}

	public function destroy($id) {
		$this->availibility('Delete Governorates');
		$governorate = Governorate::findOrFail($id);
		$governorate->delete();

		return redirect()->route('governorates.index')
			->with('flash_message',
				'Governorate "' . $governorate->name . '" deleted!');
	}

	public static function recursive($yourString) {
		$result = "";
		if (strpos($yourString, " ") === false) {
			$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
				" ", "-", "_");
			$yourString = str_replace($vowels, "", $yourString);
			$check = Governorate::where('short_name', $yourString)->first();

			if (is_null($check)) {
				return $yourString;
			}
			$only_one_word = substr($yourString, 0, 1);
			$only_one_word .= substr($yourString, 1, 1);
			$check = Governorate::where('short_name', $only_one_word)->first();
		} else {
			$words = explode(" ", $yourString);
			$first_char_after_space = substr($words[0], 0, 1);
			$first_char_after_space .= substr($words[1], 0, 1);
			if (array_key_exists(2, $words)) {
				$first_char_after_space .= substr($words[2], 0, 1);
			}
			$check_first_two_char_of_words = Governorate::where('short_name', $first_char_after_space)->first();
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
					$check_first_two_char = Governorate::where('short_name', $first_char)->first();

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
