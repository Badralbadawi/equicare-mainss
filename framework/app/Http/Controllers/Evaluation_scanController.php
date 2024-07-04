<?php

namespace App\Http\Controllers;
use App\evaluation_scan;
use App\Department;
use App\Equipment;
use App\Hospital;
// use App\CallEntry;
use App\Http\Requests\Evaluation_scanCreateRequest;
use App\Http\Requests\SparepartsRequest;

use App\ServiceRenderedItem;
use App\User;
use App\Governorate;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use App\Directorate;
use App\Sparepart;
use App\Type_of_healthfacility;

use Excel;
use Illuminate\Support\Collection;
use PDF;
class Evaluation_scanController extends Controller {

	public function index() {
		$this->availibility('View Evaluation_scans');
		$index['page'] = 'Evaluation_scan';
		$index['evaluation'] = evaluation_scan::all();
		$index['equipment'] = Equipment::all();

		$index['Governorate'] = Governorate::all();


		$index['users'] = User::pluck('name', 'id');
		return view('evaluation_scans.index', $index);
	}
	public function export($type)
	{
		$preventive = evaluation_scan::where('call_type', 'preventive')->latest()->Hospital()->get();

		if ($type == 'excel') {
			// return Excel::download(new class ($preventive) implements FromCollection {
			// 	public function __construct($collection)
			// 	{
			// 		$this->collection = $collection;
			// 	}
			// 	public function collection()
			// 	{
			// 		return $this->collection;
			// 	}
			// }, time() . '_preventive.xlsx');
			return Excel::download(new class($preventive) implements FromView
            {
                public function __construct($collection)
                {
                    $this->$collection = $collection;
                }

                public function view(): View
                {
                    return view('call_breakdowns.export_excel')->with('b_maintenance', $this->collection);
                }
            }, time(). '_preventive.xlsx');

		} else {
			//dd($equipments);
			$pdf = PDF::loadView('call_preventive.export_pdf', ['preventives' => $preventive])->setPaper('a4', 'landscape');
			return $pdf->download(time() . '_preventive.pdf');
		}

	}
	public function create() {

		$this->availibility('Create Evaluation_scans');

		$index['page'] = 'Evaluation_scans';
		$index['unique_ids'] = Equipment::query()->Hospital()->pluck('unique_id', 'id')->toArray();
		$index['departments'] = Department::select('id', \DB::raw('CONCAT(short_name,"(",name,")") as department'))->pluck('department', 'id')->toArray();
		$index['hospitals'] = Hospital::query()->Hospital()->pluck('name', 'id')->toArray();
		$index['governorates'] =
		Governorate::select('id', DB::raw('CONCAT(short_name," (" , name ,")") as full_name'))
			->pluck('full_name', 'id')
			->toArray();
		$index['directorates'] =
		Directorate::select('id', DB::raw('CONCAT(short_name," (" , name ,")") as full_name'))
			->pluck('full_name', 'id')
			->toArray();
		$index['type_of_healthfacility'] =
		Type_of_healthfacility::select('id', DB::raw('CONCAT(short_name," (" , name ,")") as full_name'))
				->pluck('full_name', 'id')
				->toArray();


		return view('evaluation_scans.create', $index);
	}

	public function store(Evaluation_scanCreateRequest $request) {
		$evaluation = new evaluation_scan;
		$equipment=new Equipment;

		$evaluation->call_handle = $request->call_handle;
		// $evaluation->call_type = 'preventive';
		$evaluation->equip_id = $request->equip_id;
		$evaluation->user_id = Auth::id();
		$sparePart= new SparePart;
		$sparePart->spare_name = json_encode( $request->spare_name);
		$sparePart->quantity = json_encode ($request->quantity);
		$sparePart->type_sp =  json_encode($request->type_sp);
		$sparePart->SPARE_NO =  json_encode($request->SPARE_NO);



		// $report_no = evaluation_scan::where('call_handle', 'internal')->count();
		// if ($evaluation->call_handle == 'external') {
		// 	$evaluation->report_no = $request->report_no;
		// } elseif ($evaluation->call_handle == 'internal') {
		// 	$evaluation->report_no = $report_no + 1;
		// }
		// if (isset($request->call_register_date_time)) {
		// 	$call_register_date_time = Carbon::parse($request->call_register_date_time);
		// 	$evaluation->call_register_date_time = $call_register_date_time;
		// }
		// if (isset($request->evaluation_scan_date_time)) {
		// 	$evaluation_scan_date_time = !empty($request->evaluation_scan_date_time) ? date('Y-m-d', strtotime($request->evaluation_scan_date_time)) : null;
		// 	$evaluation->evaluation_scan_date_time = $evaluation_scan_date_time;
		// }
		$evaluation->governorate = $request->governorate;
        $evaluation->directorate = $request->directorate;
        //  $evaluation->type_of_healthfacilityS = $request->type_of_healthfacilityS;

		$evaluation->working_status = $request->working_status;
		$evaluation->reasons_stopping = $request->reasons_stopping;
		$evaluation->assess_equipment = $request->assess_equipment;
		$evaluation->is_contamination = $request->is_contamination;
		$evaluation->save();
		$sparePart->save();
		return redirect('admin/evaluation_scans')->with('flash_message', 'Evaluation scans Entry created');
	}

	public function edit($id) {
		$this->availibility('Edit Evaluation_scans');

		$index['page'] = 'evaluation_scans';

		$index['evaluation'] = evaluation_scan::find($id);

		$index['unique_ids'] = Equipment::query()->Hospital()->withTrashed()->where('hospital_id', $index['evaluation']->equipment->hospital_id)
			->pluck('unique_id', 'id')
			->toArray();
		$h_id = $index['evaluation']->equipment->hospital_id;
		$index['departments'] = Department::select('id', \DB::raw('CONCAT(short_name,"(",name,")") as department'))
			->whereHas('equipments', function ($q) use ($h_id) {
				$q->where('hospital_id', $h_id);
			})
			->pluck('department', 'id')
			->toArray();

		$index['hospitals'] = Hospital::withTrashed()->Hospital()->pluck('name', 'id')->toArray();
		return view('call_preventive.edit', $index);
	}

	public function update(Evaluation_scanCreateRequest $request, $id) {
		$evaluation = CallEntry::findOrFail($id);
		$evaluation->call_handle = $request->call_handle;
		$evaluation->equip_id = $request->equip_id;

		if ($evaluation->call_handle == 'external') {
			$evaluation->report_no = $request->report_no;
		}
		if (isset($request->call_register_date_time)) {
			$call_register_date_time = \Carbon\Carbon::parse($request->call_register_date_time);
			$evaluation->call_register_date_time = $call_register_date_time;
		}
		if (isset($request->next_due_date)) {
			$next_due_date = !empty($request->next_due_date) ? date('Y-m-d', strtotime($request->next_due_date)) : null;
			$evaluation->next_due_date = $next_due_date;
		}
		$evaluation->working_status = $request->working_status;
		$evaluation->nature_of_problem = $request->nature_of_problem;
		$evaluation->is_contamination = $request->is_contamination;
		$evaluation->save();
		return redirect('admin/call/preventive_maintenance')->with('flash_message', 'preventive Maintenance Entry updated');
	}

	public function destroy($id) {
		$this->availibility('Delete Preventive Maintenance');
		$preventive = CallEntry::findOrFail($id);

		if ($preventive->sign_of_engineer != null && file_exists('uploads/' . $preventive->sign_of_engineer)) {
			unlink(public_path('uploads/') . $preventive->sign_of_engineer);
		}

		$preventive->delete();
		return redirect('admin/call/preventive_maintenance')->with('flash_message', 'Preventive Maintenance Entry deleted');
	}
	public function ajax_unique_id(Request $request) {
		if ($request->ajax()) {
			$equipment = Equipment::where('id', $request->id)->first();
		}
		return response()->json(['success' => $equipment->toArray()], 200);
	}

	public function ajax_hospital_change(Request $request) {
		if ($request->ajax()) {
			$unique_id = Equipment::where('hospital_id', $request->id)
				->pluck('unique_id', 'id')
				->toArray();

			$department = Equipment::where('hospital_id', $request->id)
				->pluck('department', 'department')
				->toArray();
			$department = Department::select('id', \DB::raw('CONCAT(short_name,"(",name,")") as department'))
				->whereIn('id', $department)
				->pluck('department', 'id')->toArray();
		}
		return response()->json([
			'unique_id' => $unique_id,
			'department' => array_unique($department),

		], 200);
	}

	public function ajax_department_change(Request $request) {
		if ($request->ajax()) {
			if ($request->hospital_id && $request->hospital_id != "") {

				$unique_id = Equipment::where('department', $request->department)
					->where('hospital_id', $request->hospital_id)
					->pluck('unique_id', 'id')
					->toArray();
			} else {
				$unique_id = Equipment::where('department', $request->department)
					->pluck('unique_id', 'id')
					->toArray();
			}
		}
		return response()->json(['unique_id' => $unique_id], 200);
	}

	public function attend_call_get($id) {
		$preventive_c = CallEntry::findOrFail($id);
		return response()->json(['p_m' => $preventive_c->toArray()], 200);
	}
	// use App\Http\Illuminate\Support\Facades\Facade;
	public function sparte(SparepartsRequest $request) {
		$sparePart= new Sparepart;
		// $sparePart = SparePart::findOrFail($request->b_id);
		// $validator = Validator::make($request->all(), [
			// 'call_attend_date_time' => 'required|after_or_equal:'.$preventive->call_register_date_time,
			// 'name' => 'required',
			// 'SPARE_NO' => 'required',
			// 'quantity' => 'required',
			// 'type_sp' => 'required',

		
		// [
		// 	'call_attend_date_time.after_or_equal' => 'The Call Attend Date and Time must be after or equal to  Call Register Date Time: ' . \Carbon\Carbon::parse($preventive->call_register_date_time)->format('Y-m-d H:i:s'),
		// );
		// if ($validator->fails()) {
		// 	return redirect()
		// 		->back()
		// 		->withInput($request->all())
		// 		->withErrors($validator, 'sparte');
		// }

		// $call_attend_date_time = \Carbon\Carbon::parse($request->call_attend_date_time);
		// $sparePart->call_attend_date_time = $call_attend_date_time;
		$sparePart->name = $request->user_attended;
		$sparePart->SPARE_NO = $request->service_rendered;
		$sparePart->quantity = $request->remarks;
		$sparePart->type_sp = $request->working_status;
		$sparePart->save();

		return redirect('admin/evaluation_scans/	')->with('flash_message', ' Spare Part  details saved ');
	}

	public function call_complete_get($id) {
		$preventive_c = CallEntry::findOrFail($id);
		$new_item = ServiceRenderedItem::select('new_item')->get();
		return response()->json(['p_m' => $preventive_c->toArray(), 'n_i' => $new_item], 200);
	}

	public function call_complete(Request $request) {
		$preventive = CallEntry::findOrFail($request->b_id);
		if ($request->service_rendered == 'add_new') {
			$input = $request->except('service_rendered');
		} else {
			$input = $request->all();
		}
		$validator = Validator::make($input, [
			'call_complete_date_time' => 'required|after_or_equal:'.$preventive->call_attend_date_time,
			'next_due_date' => 'required|date',
			'service_rendered' => 'required',
			'remarks' => 'required',
			'working_status' => 'required',
			'sign_of_engineer' => 'mimes:jpg,jpeg,png,pdf',
			'sign_stamp_of_incharge' => 'mimes:jpg,jpeg,png,pdf',
		],
		[
			'call_complete_date_time.after_or_equal' => 'The Call Complete Date and Time must be after or equal to  Call Attend Date Time: ' . \Carbon\Carbon::parse($preventive->call_attend_date_time)->format('Y-m-d H:i:s'),
		]
	);
		if ($validator->fails()) {
			return redirect()
				->back()
				->withInput($request->all())
				->withErrors($validator, 'complete_call');
		}
		if ($request->hasFile('sign_of_engineer')) {
			$destinationPath = 'uploads/sign_of_enginner';
			$file = $request->file('sign_of_engineer');
			$name = 'engineer' . time() . $file->getClientOriginalName();

			if (!is_null($preventive->sign_of_engineer) && file_exists('uploads/' . $preventive->sign_of_engineer)) {
				unlink('uploads/sign_of_enginner/'. $preventive->sign_of_engineer);
			}
			$file->move($destinationPath, $name);
			$preventive->sign_of_engineer = $name;
		}
		if ($request->hasFile('sign_stamp_of_incharge')) {
			$destinationPath = 'uploads/sign_stamp_of_incharge';
			$file = $request->file('sign_stamp_of_incharge');
			$name = 'incharge' . time() . $file->getClientOriginalName();
			if (!is_null($preventive->sign_stamp_of_incharge) && file_exists('uploads/' . $preventive->sign_stamp_of_incharge)) {
				unlink('uploads/sign_stamp_of_incharge/'.$preventive->sign_stamp_of_incharge);
			}
			$file->move($destinationPath, $name);
			$preventive->sign_stamp_of_incharge = $name;
		}

		$call_complete_date_time = Carbon::parse($request->call_complete_date_time);
		$preventive->call_complete_date_time = $call_complete_date_time;
		$next_due_date = Carbon::parse($request->next_due_date);
		$preventive->next_due_date = $next_due_date;
		$preventive->service_rendered = $request->service_rendered;
		$preventive->remarks = $request->remarks;
		$preventive->working_status = $request->working_status;
		$preventive->save();
		return redirect('admin/call/preventive_maintenance')
			->with('flash_message', 'preventive Call complete details saved ')
			->with('breakdown_p', $preventive);
	}

	// public function ajax_new_item_post(Request $request) {
	// 	if ($request->ajax()) {
	// 		if ($request->new_item != "") {
	// 			$new_item_db = new ServiceRenderedItem;
	// 			$new_item_db->new_item = $request->new_item;
	// 			$new_item_db->save();
	// 			return response()->json(['new_item_db' => $new_item_db], 200);
	// 		} else {
	// 			return response()->json(['new_item_db' => ''], 200);
	// 		}
	// 	}

	// }
	public static function availibility($method) {
		// $r_p = Auth::user()->getPermissionsViaRoles()->pluck('name')->toArray();
		if (\Auth::user()->hasDirectPermission($method)) {
			return true;
		} else {
			abort('401');
		}
		// if (Auth::user()->hasDirectPermission($method)) {
		// 	return true;
		// } elseif (!in_array($method, $r_p)) {
		// 	abort('401');
		// } else {
		// 	return true;
		// }
	}
}
