<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accessorie;
use App\Http\Requests\AccessoriesRequest;
class AccessoriesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
		$this->availibility('View Accessories');
		$data['page'] = 'accessories';
		$data['accessories'] = Accessorie::all();
		return view('accessories.index', $data);
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
		$this->availibility('Create Accessories');
		$data['page'] = 'accessories';
		return view('accessories.create', $data);
	}

	public function store(AccessoriesRequest $request) {
		$accessorie = new Accessorie;
		$accessorie->name_acce = $request->name_acce;
		$accessorie->code_ac = $request->code_ac;
		$accessorie->quantity_ac = $request->quantity_ac;
		$accessorie->piece_number = $request->piece_number;
		$accessorie->save();

		return redirect()->route('accessories.index')
			->with('flash_message',
				'Accessorie "' . $accessorie->name . '" Created!');
	}

	public function edit($id) {
		// $this->availibility('Edit Accessories');
		$data['page'] = 'accessories';
		$data['accessories'] = Accessorie::findOrFail($id);
		return view('accessories.edit', $data);
	}

	public function update(AccessoriesRequest $request, $id) {
		$accessorie = Accessorie::findOrFail($id);
		$accessorie->name_acce = $request->name_acce;
		$accessorie->code_ac = $request->code_ac;
		$accessorie->piece_number = $request->piece_number;
		$accessorie->quantity_ac = $request->quantity_ac;
		$accessorie->save();

		return redirect()->route('accessories.index')
			->with('flash_message',
				'Accessorie "' . $accessorie->name . '" updated!');
	}

	public function destroy($id) {
		$this->availibility('Delete Accessories');
		$accessorie = Accessorie::findOrFail($id);
		$accessorie->delete();

		return redirect()->route('accessories.index')
			->with('flash_message',
				'Accessorie "' . $accessorie->name . '" deleted!');
	}

	public static function recursive($yourString) {
		$result = "";
		if (strpos($yourString, " ") === false) {
			$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
				" ", "-", "_");
			$yourString = str_replace($vowels, "", $yourString);
			$check = Accessorie::where('code', $yourString)->first();

			if (is_null($check)) {
				return $yourString;
			}
			$only_one_word = substr($yourString, 0, 1);
			$only_one_word .= substr($yourString, 1, 1);
			$check = Accessorie::where('code', $only_one_word)->first();
		} else {
			$words = explode(" ", $yourString);
			$first_char_after_space = substr($words[0], 0, 1);
			$first_char_after_space .= substr($words[1], 0, 1);
			if (array_key_exists(2, $words)) {
				$first_char_after_space .= substr($words[2], 0, 1);
			}
			$check_first_two_char_of_words = Accessorie::where('code', $first_char_after_space)->first();
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
					$check_first_two_char = Accessorie::where('code', $first_char)->first();

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

