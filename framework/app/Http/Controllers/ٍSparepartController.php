<?php

namespace App\Http\Controllers;

use App\Sparepart;
use App\Http\Requests\SparepartsRequest;
use App\ٍSparepart;

class ٍSparepartController extends Controller {

	public function index() {
		$this->availibility('View ٍSpareparts');
		$data['page'] = 'ٍSpareparts';
		$data['spareparts'] = Sparepart::all();
		return view('spareparts.index', $data);
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
		$this->availibility('Create ٍSpareparts');
		$data['page'] = 'ٍSpareparts';
		return view('ٍSpareparts.create', $data);
	}

	public function store(SparepartsRequest $request) {
		$ٍsparepart = new Sparepart();
		$ٍsparepart->name = $request->name;
		$ٍsparepart->quantity = $request->quantity;
		$ٍsparepart-> equipment_id= $request->equipment_id;
		$ٍsparepart ->item_id=$request->item_id;
		$ٍsparepart ->type_sp= $request->type_sp;
		$ٍsparepart->save();

		return redirect()->route('spareparts.index')
			->with('flash_message',
				'Sparepart "' . $ٍsparepart->name . '" Created!');
	}

	public function edit($id) {
		$this->availibility('Edit Spareparts');
		$data['page'] = 'spareparts';
		$data['ٍSparepart'] = Sparepart::findOrFail($id);
		return view('spareparts.edit', $data);
	}

	public function update(SparepartsRequest $request, $id) {
		$ٍsparepart = Sparepart::findOrFail($id);
		$ٍsparepart->name = $request->name;
		$ٍsparepart->quantity = $request->quantity;
		$ٍsparepart-> equipment_id= $request->equipment_id;
		$ٍsparepart ->item_id=$request->item_id;
		$ٍsparepart ->type_sp= $request->type_sp;
		$ٍsparepart->save();

		return redirect()->route('departments.index')
			->with('flash_message',
				'Sparepart "' . $ٍsparepart->name . '" updated!');
	}

	public function destroy($id) {
		$this->availibility('Delete Sparepart');
		$ٍsparepart = ٍSparepart::findOrFail($id);
		$ٍsparepart->delete();

		return redirect()->route('departments.index')
			->with('flash_message',
				'Department "' . $ٍsparepart->name . '" deleted!');
	}

	public static function recursive($yourString) {
		$result = "";
		if (strpos($yourString, " ") === false) {
			$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
				" ", "-", "_");
			$yourString = str_replace($vowels, "", $yourString);
			$check = ٍSparepart::where('short_name', $yourString)->first();

			if (is_null($check)) {
				return $yourString;
			}
			$only_one_word = substr($yourString, 0, 1);
			$only_one_word .= substr($yourString, 1, 1);
			$check = ٍSparepart::where('short_name', $only_one_word)->first();
		} else {
			$words = explode(" ", $yourString);
			$first_char_after_space = substr($words[0], 0, 1);
			$first_char_after_space .= substr($words[1], 0, 1);
			if (array_key_exists(2, $words)) {
				$first_char_after_space .= substr($words[2], 0, 1);
			}
			$check_first_two_char_of_words = ٍSparepart::where('short_name', $first_char_after_space)->first();
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
					$check_first_two_char = ٍSparepart::where('short_name', $first_char)->first();

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
