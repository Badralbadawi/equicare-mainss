<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hospital;
use App\Http\Requests\TestCalibrationsRequest;
use Auth;
use App\User;
use App\Directorate;
use App\TestCalibration;
use App\Governorate;
use App\Equipment;

use App\Physical_conditions;
use App\Electrical_safetys;
use App\PreventiveMaintenance;
use App\Performance_testings;
use Illuminate\Support\Facades\DB;
class TestCalibrationsController extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $this->availibility('View Test_and_calibrations');
            $index['page'] = 'test_and_calibrations';
            $index['test_and_calibrations'] = TestCalibration::all();
    
            return view('test_and_calibrations.index', $index);
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $this->availibility('Create Test_and_calibrations');
            $index['page'] = 'test_and_calibrations';
            $index['unique_ids'] = Equipment::query()->Hospital()->pluck('unique_id', 'id')->toArray();

            $index['hospitals'] = Hospital::query()->Hospital()->pluck('name', 'id')->toArray();
            $index['governorates'] =
            Governorate::select('id', DB::raw('CONCAT(short_name," (" , name ,")") as full_name'))
                ->pluck('full_name', 'id')
                ->toArray();
            $index['directorates'] =
            Directorate::select('id', DB::raw('CONCAT(short_name," (" , name ,")") as full_name'))
                ->pluck('full_name', 'id')
                ->toArray();
    
            return view('test_and_calibrations.create', $index);
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(TestCalibrationsRequest $request)
        {
            $test_and_calibration = new TestCalibration;
            // $test_and_calibration->name = $request->name;
            $test_and_calibration->governorate = $request->governorate;
            $test_and_calibration->directorate = $request->directorate;
            $test_and_calibration->hospital = $request->hospital;
            // $test_and_calibration->manufacturer = $request->manufacturer;
            // $test_and_calibration->serial_number= $request->serial_number;
            // $test_and_calibration->number = $request->number;
            // $test_and_calibration->model = $request->model;
            // $test_and_calibration->location = $request->location;
            $test_and_calibration->technician = $request->technician;
            $test_and_calibration->test_type_incoming = $request->test_type_incoming;
            $test_and_calibration->post_repair = $request->post_repair;
            $test_and_calibration->date = $request->date;
            $test_and_calibration->physical_condition = $request->physical_condition;
            $test_and_calibration->electrical_safety = $request->electrical_safety;
            $test_and_calibration->performance_testing = $request->performance_testing;
            $test_and_calibration->physical_condition = $request->physical_condition;
            $test_and_calibration->save();



// Physical_conditions model 

            $physical_condition= new Physical_conditions;
            $physical_condition->device_clean_decontaminated = $request->device_clean_decontaminated;
            $physical_condition->no_physical_damage=$request->no_physical_damage;
            $physical_condition->switches_controls_operable= $request->switches_controls_operable;
            $physical_condition->display_intensity_adequate= $request->display_intensity_adequate;
            $physical_condition->control_labeling_present=$request->control_labeling_present;
            $physical_condition->hoses_inlets_available= $request->hoses_inlets_available;
            $physical_condition->power_cord_accessories_intact=$request->power_cord_accessories_intact;
            $physical_condition->filters_vents_clean= $request->filters_vents_clean;
            $physical_condition->test_result= $request->test_result;
            $physical_condition->save();


            // Electrical_safetys model

            $electrical_safety= new Electrical_safetys;
            $electrical_safety->ground_wire_resistance= $request->ground_wire_resistance;
            $electrical_safety->chassis_leakage= $request->chassis_leakage;
            $electrical_safety->patient_leakage_current= $request->patient_leakage_current;
            $electrical_safety->ground_wire_presence= $request->ground_wire_presence;
            $electrical_safety->ground_to_neutral_voltage= $request->ground_to_neutral_voltage;
            $electrical_safety->ground_to_line_voltage= $request->ground_to_line_voltage;
           
            if ($request->ground_wire_resistance > 0.3) {
                $ground_wire_resistance_result = 'Fail';
            } elseif ($request->ground_wire_resistance < 0.3) {
                $ground_wire_resistance_result = 'Pass';
            } else {
                $ground_wire_resistance_result = 'N/A';
            }


            if ($request->chassis_leakage > 100) {
                $chassis_leakage_result = 'Fail';
            } elseif ($request->chassis_leakage < 100) {
                $chassis_leakage_result = 'Pass';
            } else {
                $chassis_leakage_result = 'N/A';
            }


            if ($request->patient_leakage_current > 100) {
                $patient_leakage_current_result = 'Fail';
            } elseif ($request->patient_leakage_current < 100) {
                $patient_leakage_current_result = 'Pass';
            } else {
                $patient_leakage_current_result = 'N/A';
            }

            $electrical_safety->ground_wire_resistance_result=$ground_wire_resistance_result;
            $electrical_safety->chassis_leakage_result= $chassis_leakage_result;
            $electrical_safety->patient_leakage_current_result= $patient_leakage_current_result;

            $electrical_safety->save();

            $preventiveMaintenance =new PreventiveMaintenance;
            $preventiveMaintenance->clean_cooling_vents_and_filters=$request->clean_cooling_vents_and_filters;
            $preventiveMaintenance->Inspect_and_clean_ducts_heater_and_fans=$request->Inspect_and_clean_ducts_heater_and_fans;
            $preventiveMaintenance->Inspect_gaskets_for_signs_of_deterioration=$request->Inspect_gaskets_for_signs_of_deterioration;
            $preventiveMaintenance->Inspect_port_closures_and_port_sleeves=$request->Inspect_port_closures_and_port_sleeves;
            $preventiveMaintenance->Replace_battery_every_24_months=$request->Replace_battery_every_24_months;
            $preventiveMaintenance->Complete_model_specific_preventive_maintenance=$request->Complete_model_specific_preventive_maintenance;
            $preventiveMaintenance->save();



            // Performance_testings model
            $performance_testings= new Performance_testings;
            $performance_testings->verifies_battery_operation=$request->verifies_battery_operation;
            $performance_testings->fan_operation=$request->fan_operation;
            $performance_testings->warm_up_time=$request->warm_up_time;
            $performance_testings->air_temperature_accuracy=$request->air_temperature_accuracy;
            $performance_testings->skin_temperature_accuracy=$request->skin_temperature_accuracy;
            $performance_testings->temperature_overshoot=$request->temperature_overshoot;
            $performance_testings->air_flow=$request->air_flow;
            $performance_testings->air_temperature_alarms=$request->air_temperature_alarms;
            $performance_testings->skin_temperature_alarms=$request->skin_temperature_alarms;
            $performance_testings->high_temperature_protection=$request->high_temperature_protection;
            // $performance_testings->alarm_noise_level_low=$request->alarm_noise_level_low;
            // $performance_testings->alarm_noise_level_high=$request->alarm_noise_level_high;
            $performance_testings->alarm_function=$request->alarm_function;
            $performance_testings->complete_model_testing=$request->complete_model_testing;


            $performance_testings->noise_Level=$request->noise_Level;

            if ($request->noise_Level < 60) {
                $noiseClassification = 'Normal Conditions';
            } elseif ($request->noiseLevel < 80 && $request->noise_Level >= 80) {
                $noiseClassification = 'Alarm Activated';
            } else {
                $noiseClassification = 'Invalid Value';
            }
            $performance_testings->noiseClassification= $noiseClassification;

            $performance_testings->save();

        
            // User::where('select_all', 1)->get()->each(function ($user) use ($test_and_calibration) {
            //     $user->test_and_calibrations()->attach($test_and_calibration->id);
            // });
            return redirect()->route('test_and_calibrations.index');
            // return redirect('admin/test_and_calibrations', $test_and_calibration);
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Test_and_calibration  $test_and_calibration
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $this->availibility('Edit Test_and_calibrations');
            $index['page'] = 'test_and_calibrations';
            $index['test_and_calibration'] = TestCalibration::findOrFail($id);
            $index['hospitals'] = Hospital::query()->Hospital()->pluck('name', 'id')->toArray();
            $index['governorates'] =
            Governorate::select('id', DB::raw('CONCAT(short_name," (" , name ,")") as full_name'))
                ->pluck('full_name', 'id')
                ->toArray();
            $index['directorates'] =
            Directorate::select('id', DB::raw('CONCAT(short_name," (" , name ,")") as full_name'))
                ->pluck('full_name', 'id')
                ->toArray();
            
            return view('test_and_calibrations.edit', $index);
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Test_and_calibration  $test_and_calibration
         * @return \Illuminate\Http\Response
         */
        public function update(TestCalibrationsRequest $request, $id)
        {
            $test_and_calibration = new TestCalibration;
            $test_and_calibration->name = $request->name;
            $test_and_calibration->governorate = $request->governorate;
            $test_and_calibration->directorate = $request->directorate;
            $test_and_calibration->hospital_id = $request->hospital_id;
            $test_and_calibration->manufacturer = $request->manufacturer;
            $test_and_calibration->serial_number = $request->serial_number;
            $test_and_calibration->number = $request->number;
            $test_and_calibration->model = $request->model;
            $test_and_calibration->location = $request->location;
            $test_and_calibration->technician = $request->technician;
            $test_and_calibration->test_type_incoming = $request->test_type_incoming;
            $test_and_calibration->post_repair = $request->post_repair;
            $test_and_calibration->date = $request->date;
            $test_and_calibration->physical_condition = $request->physical_condition;
            $test_and_calibration->electrical_safety = $request->electrical_safety;
            $test_and_calibration->performance_testing = $request->performance_testing;
            $test_and_calibration->physical_condition = $request->physical_condition;
            $test_and_calibration->save();
    
            return redirect('admin/test_and_calibrations',$test_and_calibration);
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Test_and_calibration  $test_and_calibration
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $this->availibility('Delete Test_and_calibrations');
            $test_and_calibration = TestCalibration::findOrFail($id);
            $test_and_calibration->delete();
    
            return redirect('admin/test_and_calibrations')->with('flash_message', 'Test_and_calibration "' . $test_and_calibration->name . '" deleted');
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
            // 	return true;
            // } elseif (!in_array($method, $r_p)) {
            // 	abort('401');
            // } else {
            // 	return true;
            // }
        }
        public static function recursive($yourString)
        {
            if (strpos($yourString, " ") === false) {
                $vowels = array(
                    "a",
                    "e",
                    "i",
                    "o",
                    "u",
                    "A",
                    "E",
                    "I",
                    "O",
                    "U",
                    " "
                );
                $yourString = str_replace($vowels, "", $yourString);
                $only_one_word = substr($yourString, 0, 1);
                $only_one_word .= substr($yourString, 1, 1);
                $check = TestCalibration::where('slug', $only_one_word)->first();
                if ($check == "") {
                    $result = $only_one_word;
                }
            } else {
                $words = explode(" ", $yourString);
                $first_char_after_space = substr($words[0], 0, 1);
                $first_char_after_space .= substr($words[1], 0, 1);
                if (array_key_exists(2, $words)) {
                    $first_char_after_space .= substr($words[2], 0, 1);
                }
                $check_first_two_char_of_words = TestCalibration::where('slug', $first_char_after_space)->first();
                if ($check_first_two_char_of_words == "") {
                    $result = $first_char_after_space;
                } else {
                    $result = "";
                }
                if ($result == "") {
                    $vowels = array(
                        "a",
                        "e",
                        "i",
                        "o",
                        "u",
                        "A",
                        "E",
                        "I",
                        "O",
                        "U",
                        " "
                    );
                    $yourString = str_replace($vowels, "", $yourString);
                    $count = 1;
                    for ($i = 1; $i <= strlen($yourString); $i++) {
                        $first_char = substr($yourString, 0, 1);
                        $first_char .= substr($yourString, $i, 1);
                        $check_first_two_char = TestCalibration::where('slug', $first_char)->first();
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
    