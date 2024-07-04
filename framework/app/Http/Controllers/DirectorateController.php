<?php

namespace App\Http\Controllers;
use App\Directorate;
use App\Governorate;
use App\Http\Requests\DirectorateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\DirectorateImport;
class DirectorateController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
		$this->availibility('View Directorates');
		$data['page'] = 'directorates';
		$data['directorates'] = Directorate::all();
		return view('directorates.index', $data);
	}
	public function importFromExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
        ]);

        $import = new DirectorateImport();
        $import->import($request->file('excel_file'));

        // Add any additional logic, like redirecting or returning a success message
        return redirect()->back()->with('success', 'Directorates imported successfully!');
    }

	public static function availibility($method)
    {

    // $r_p = \Auth::user()->getPermissionsViaRoles()->pluck('name')->toArray();
			// if (\Auth::user()->hasDirectPermission($method)) {
			// 	return true;
			// } else {
			// 	abort('401');
			// }

        // if (\Auth::user()->hasDirectPermission($method)) {

        //     return true;
        // } elseif (!in_array($method, $r_p)) {
        //     abort('401');
        // } else {
        //     return true;
        // }
    }

	public function create() {
		$this->availibility('Create Directorates');
		$data['page'] = 'directorates';
		$data['governorates'] =
		Governorate::select('id', DB::raw('CONCAT(short_name," (" , name ,")") as full_name'))
			->pluck('full_name', 'id')
			->toArray();
		return view('directorates.create', $data);
	}

	public function store(DirectorateRequest $request) {
		$directorate = new Directorate;
		$directorate->name = $request->name;
		$directorate->short_name = $request->short_name;
		$directorate->governorate = $request->governorate;
		$directorate->save();

		return redirect()->route('directorates.index')
			->with('flash_message',
				'Directorate "' . $directorate->name . '" Created!');
	}

	public function edit($id) {
		// $this->availibility('Edit Directorates');
		$data['page'] = 'directorates';
		$data['directorate'] = Directorate::findOrFail($id);
		$data['governorates'] =
            Governorate::select('id', DB::raw('CONCAT(short_name," (" , name ,")") as full_name'))
                ->pluck('full_name', 'id')
                ->toArray();
		return view('directorates.edit', $data);
	}

	public function update(DirectorateRequest $request, $id) {
		$directorate = Directorate::findOrFail($id);
		$directorate->name = $request->name;
		$directorate->short_name = $request->short_name;
		$directorate->governorate= $request->governorate;
		$directorate->save();

		return redirect()->route('directorates.index')
			->with('flash_message',
				'Directorate "' . $directorate->name . '" updated!');
	}

	public function destroy($id) {
		$this->availibility('Delete Directorates');
		$directorate = Directorate::findOrFail($id);
		$directorate->delete();

		return redirect()->route('directorates.index')
			->with('flash_message',
				'Directorate "' . $directorate->name . '" deleted!');
	}

	public static function recursive($yourString) {
		$result = "";
		if (strpos($yourString, " ") === false) {
			$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
				" ", "-", "_");
			$yourString = str_replace($vowels, "", $yourString);
			$check = Directorate::where('short_name', $yourString)->first();

			if (is_null($check)) {
				return $yourString;
			}
			$only_one_word = substr($yourString, 0, 1);
			$only_one_word .= substr($yourString, 1, 1);
			$check = Directorate::where('short_name', $only_one_word)->first();
		} else {
			$words = explode(" ", $yourString);
			$first_char_after_space = substr($words[0], 0, 1);
			$first_char_after_space .= substr($words[1], 0, 1);
			if (array_key_exists(2, $words)) {
				$first_char_after_space .= substr($words[2], 0, 1);
			}
			$check_first_two_char_of_words = Directorate::where('short_name', $first_char_after_space)->first();
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
					$check_first_two_char = Directorate::where('short_name', $first_char)->first();

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
