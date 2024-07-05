<?php

namespace App\Http\Controllers;
use App\EquipmentName;
use App\Http\Requests\EquipmentNameRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class EquipmentNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
		$this->availibility('View EquipmentNames');
		$data['page'] = 'equipmentsnames';
		$data['equipmentsnames'] = EquipmentName::all();
		return view('equipmentsnames.index', $data);
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
		$this->availibility('Create EquipmentNames');
		$data['page'] = 'equipmentsnames';
		return view('equipmentsnames.create', $data);
	}

	public function store(EquipmentNameRequest $request) {
		$equipmentsname = new EquipmentName;
		$equipmentsname->name = $request->name;
		$equipmentsname->sr_no = $request->sr_no;
		$equipmentsname->code = $request->code;
		$equipmentsname->save();

		return redirect()->route('equipmentsnames.index')
			->with('flash_message',
				'EquipmentNames "' . $equipmentsname->name . '" Created!');
	}

	public function edit($id) {
		// $this->availibility('Edit EquipmentNames');
		$data['page'] = 'equipmentsnames';
		$data['equipmentsnames'] = EquipmentName::findOrFail($id);
		return view('equipmentsnames.edit', $data);
	}

	public function update(EquipmentNameRequest $request, $id) {
		$equipmentsname = EquipmentName::findOrFail($id);
		$equipmentsname->name = $request->name;
		$equipmentsname->sr_no = $request->sr_no;
		$equipmentsname->code = $request->code;
		$equipmentsname->save();

		return redirect()->route('equipmentsnames.index')
			->with('flash_message',
				'EquipmentNames "' . $equipmentsname->name . '" updated!');
	}

	public function destroy($id) {
		$this->availibility('Delete EquipmentNames');
		$equipmentsname = EquipmentName::findOrFail($id);
		$equipmentsname->delete();

		return redirect()->route('equipmentsnames.index')
			->with('flash_message',
				'EquipmentNames "' . $equipmentsname->name . '" deleted!');
	}

	public static function recursive($yourString) {
		$result = "";
		if (strpos($yourString, " ") === false) {
			$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
				" ", "-", "_");
			$yourString = str_replace($vowels, "", $yourString);
			$check = EquipmentName::where('code', $yourString)->first();

			if (is_null($check)) {
				return $yourString;
			}
			$only_one_word = substr($yourString, 0, 1);
			$only_one_word .= substr($yourString, 1, 1);
			$check = EquipmentName::where('code', $only_one_word)->first();
		} else {
			$words = explode(" ", $yourString);
			$first_char_after_space = substr($words[0], 0, 1);
			$first_char_after_space .= substr($words[1], 0, 1);
			if (array_key_exists(2, $words)) {
				$first_char_after_space .= substr($words[2], 0, 1);
			}
			$check_first_two_char_of_words = EquipmentName::where('code', $first_char_after_space)->first();
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
					$check_first_two_char = EquipmentName::where('code', $first_char)->first();

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

