<?php

namespace App\Http\Controllers;
use App\Piece;
use App\Http\Requests\PieceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    public function index() {
		$this->availibility('View Pieces');
		$index['page'] = 'pieces';
		$index['pieces'] = piece::all();
		return view('pieces.index', $index);
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
		$this->availibility('Create Pieces');
		$index['page'] = 'Pieces'; 
		return view('pieces.create', $index);
	}

	public function store(pieceRequest $request) {
		
		$piece = new Piece;
		$piece->name_p = $request->name_p;
		// $piece->type_pi = $request->type_pi;
		$piece->type_pi = $request->type_pi;
		$piece->numper_pi = $request->numper_pi;
		$piece->code_pi = $request->code_pi;
		$piece->quantity_pi = $request->quantity_pi;
		$piece->save();

		return redirect()->route('pieces.index')
			->with('flash_message',
				'Pieces"' . $piece->name . '" Created!');
	}

	public function edit($id) {
		$this->availibility('Edit Pieces');
		$index['page'] = 'pieces';
		return view('pieces.edit', $index);
	}

	public function update(PieceRequest $request, $id) {
		$piece = Piece::findOrFail($id);
		$piece->name_p = $request->name_p;
		$piece->type_pi = $request->type_pi;
		// $piece->type_pi = $request->type_pi;F
		$piece->numper_pi = $request->numper_pi;
		$piece->code_pi = $request->code_pi;
		$piece->quantity_pi = $request->quantity_pi;
		$piece->save();

		return redirect()->route('pieces.index')
			->with('flash_message',
				'Pieces "' . $piece->name . '" updated!');
	}

	public function destroy($id) {
		$this->availibility('Delete Pieces');
		$piece = Piece::findOrFail($id);
		$piece->delete();
		return redirect('admin/pieces')->with('flash_message', 'Piece deleted	');
	}
	public static function recursive($yourString) {
		$result = "";
		if (strpos($yourString, " ") === false) {
			$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
				" ", "-", "_");
			$yourString = str_replace($vowels, "", $yourString);
			$check = Piece::where('code', $yourString)->first();

			if (is_null($check)) {
				return $yourString;
			}
			$only_one_word = substr($yourString, 0, 1);
			$only_one_word .= substr($yourString, 1, 1);
			$check = Piece::where('code', $only_one_word)->first();
		} else {
			$words = explode(" ", $yourString);
			$first_char_after_space = substr($words[0], 0, 1);
			$first_char_after_space .= substr($words[1], 0, 1);
			if (array_key_exists(2, $words)) {
				$first_char_after_space .= substr($words[2], 0, 1);
			}
			$check_first_two_char_of_words = Piece::where('code', $first_char_after_space)->first();
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
					$check_first_two_char = Piece::where('code', $first_char)->first();

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

