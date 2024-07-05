<?php

namespace App\Http\Controllers;
use App\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() {
		$this->availibility('View Suppliers');
		$index['page'] = 'suppliers';
		$index['suppliers'] = Supplier::all();
		return view('suppliers.index', $index);
	}

	public function create() {
		$this->availibility('Create Suppliers');
		$index['page'] = 'suppliers';
		 
		return view('suppliers.create', $index);
	}

	public function store(SupplierRequest $request) {
		
		$supplier = new Supplier;
		$supplier->name = $request->name;
		$supplier->email = $request->email;
		$supplier->phone_no = $request->phone_no;
		$supplier->adress = $request->adress;
		$supplier->save();

		return redirect('admin/suppliers')->with('flash_message', 'Supplier created');
	}

	public function edit($id) {
		$this->availibility('Edit Suppliers');
		$index['page'] = 'suppliers';
		return view('suppliers.edit', $index);
	}

	public function update(SupplierRequest $request, $id) {
		$supplier = Supplier::findOrFail($id);
		$supplier->name = $request->name;
		$supplier->email = $request->email;
		$supplier->phone_no = $request->phone_no;
		$supplier->adress = $request->adress;
		$supplier->save();

		return redirect()->route('suppliers.index')
			->with('flash_message',
				'Suppliers "' . $supplier->name . '" updated!');
	}

	public function destroy($id) {
		$this->availibility('Delete Suppliers');
		$supplier = Supplier::findOrFail($id);
		$supplier->delete();
		return redirect('admin/suppliers')->with('flash_message', 'Supplier deleted	');
	}
	public static function availibility($method) {
		// $r_p = \Auth::user()->getPermissionsViaRoles()->pluck('name')->toArray();
		if (\Auth::user()->hasDirectPermission($method)) {
			return true;
		} else {
			abort('401');
		}
		// if (\Auth::user()->hasDirectPermission($method)) {
		// 	return true;
		// } elseif (!in_array($method, $r_p)) {
		// 	abort('401');
		// } else {
		// 	return true;
		// }
	}
}
