@extends('layouts.admin')
@section('body-title')
@lang('equicare.test_and_calibrations')
@endsection
@section('title')
	| @lang('equicare.test_and_calibrations')
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('admin/test_and_calibrations') }}">@lang('equicare.test_and_calibrations') </a></li>
<li class="active">@lang('equicare.create')</li>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title">@lang('equicare.create_test_and_calibration')</h4>
				</div>

				<div class="box-body ">
										

					@include ('errors.list')
					<form class="form" method="POST" action="{{ route('test_and_calibrations.store') }}">
						{{ csrf_field() }}
						{{ method_field('POST') }}
						<div class="row">
							<div class="form-group col-md-4">
								<label for="governorate"> @lang('equicare.Governorate') </label>
								<input type="text" name="governorate" class=" governorate form-control" value=""  />
							</div>
		
						
						<div class="form-group col-md-4">
							<label for="governorate"> @lang('equicare.directorate') </label>
							<input type="text" name="directorate" class=" directorate form-control" value=""  />
						</div>
					
					<div class="form-group col-md-4">
						<label for="governorate"> @lang('equicare.type_of_healthfacility') </label>
						<input type="text" name="type_of_healthfacilityS" class=" type_of_healthfacilityS form-control" value=""  />
					</div>
		
		
							 
							<div class="form-group col-md-4">
								<label for="department"> @lang('equicare.hospital') </label>
		
								{!! Form::select('hospital',($hospitals)??[],null,['class'=>'form-control
								hospital_select2','placeholder'=>'Select']) !!}
							</div>
							{{-- <div class="form-group col-md-4">
								<label for="department"> @lang('equicare.department') </label>
		
								{!! Form::select('department',array_unique($departments)??[],null,['class'=>'form-control
								department_select2','placeholder'=>'Select']) !!}
							</div> --}}
							<div class="form-group col-md-4">
								<label for="unique_id"> @lang('equicare.unique_id') </label>
								{!! Form::select('unique_id',$unique_ids??[],null,['class'=>'form-control
								unique_id_select2','placeholder'=>'Select Unique Id']) !!}
							</div>
							<div class="form-group col-md-4">
								<label for="equip_name"> @lang('equicare.equipment_name') </label>
								<input type="text" name="" class="equip_name form-control" value="" disabled />
							</div>
		
							<div class="form-group col-md-4">
								<label for="sr_no"> @lang('equicare.serial_number') </label>
								<input type="text" name="sr_no" class="form-control sr_no" value="" disabled />
							</div>
							<div class="form-group col-md-4">
								<label for="company"> @lang('equicare.company') </label>
								<input type="text" name="company" class=" company form-control" value="" disabled />
							</div>
							<div class="form-group col-md-4">
								<label for="model"> @lang('equicare.model') </label>
								<input type="text" name="model" class=" company form-control" value="" disabled />
							</div>
							<div class="form-group col-md-4">
								<label for="model_number"> @lang('equicare.model_number') </label>
								<input type="text" name="model_number" class=" model_number form-control" value="" disabled />
							</div>
							<div class="form-group col-md-4">
								<label for="Location"> @lang('equicare.Location') </label>
								<input type="text" name="Location" class=" Location form-control" value="" disabled />
							</div>
		
							<div class="form-group col-md-4">
								<label for="Manufacturer"> @lang('equicare.Manufacturer') </label>
								<input type="text" name="Manufacturer" class=" Manufacturer form-control" value="" disabled />
							</div>
		
									
		


							{{-- <div class="form-group col-md-4">
								<label for="type_of_healthfacility"> @lang('equicare.Governorate')</label>
								<select name="governorate" id="governorate" class="form-control" placeholder='--select--' required>
									<option value="">-select--</option>
									@foreach ($governorates as $id => $name)
										<option value="{{ $name }}">{{ $name }}</option>
									@endforeach
								</select>
							</div>
						
							 <div class="form-group col-md-4">
								<label for="type_of_healthfacility"> @lang('equicare.directorate')</label>
								<select name="directorate" id="directorate" class="form-control" placeholder='--select--' required>
									<option value="">-select--</option>
									@foreach ($directorates as $id => $name)
										<option value="{{ $name }}">{{ $name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="hospital"> @lang('equicare.directorate')</label>
								<select name="hospital" id="hospital" class="form-control" placeholder='--select--' required>
									<option value="">-select--</option>
									@foreach ($hospitals as $id => $name)
										<option value="{{ $name }}">{{ $name }}</option>
									@endforeach
								</select>
							</div> --}}
							<div class="form-group col-md-4">
								<label for="certificate_no"> @lang('equicare.certificate_no') </label>
								<input type="text" name="certificate_no" class="form-control"
								value="{{ old('certificate_no') }}" />
							</div>  
						{{-- <div class="form-group col-md-2">
							<label for="manufacturer"> @lang('equicare.manufacturer') </label>
							<input type="text" name="manufacturer" class="form-control"
							value="{{ old('manufacturer') }}" />
						</div> --}}
						{{-- <div class="form-group col-md-6">
							<label for="manufacturer"> @lang('equicare.manufacturer') </label>
							<input type="text" name="email" class="form-control" value="{{ old('manufacturer') }}"/>
						</div> --}}
						{{-- <div class="form-group col-md-2">
							<label for="serial_number"> @lang('equicare.serial_number') </label>
							<input type="text" name="serial_number" class="form-control"
							value="{{ old('serial_number') }}" />
						</div>
						<div class="form-group col-md-2">
							<label for="number"> @lang('equicare.number') </label>
							<input type="text" name="number" class="form-control"
							value="{{ old('number') }}" />
						</div>
						<div class="form-group col-md-2">
							<label for="model"> @lang('equicare.model') </label>
							<input type="text" name="model" class="form-control"
							value="{{ old('model') }}" />
						</div>
						<div class="form-group col-md-4">
							<label for="location"> @lang('equicare.location') </label>
							<input type="text" name="location" class="form-control"
							value="{{ old('location') }}" /> --}}
						</div>
						<div class="form-group col-md-4">
							<label for="technician"> @lang('equicare.techniciand') </label>
							<input type="text" name="technician" class="form-control phone"
							value="{{ old('technician') }}" />
						</div>
						<div class="form-group col-md-4">
							<label for="test_type_incoming"> @lang('equicare.test_type_incoming') </label>
							<input type="text" name="test_type_incoming" class="form-control phone"
							value="{{ old('test_type_incoming') }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="post_repair"> @lang('equicare.post_repair') </label>
							<input type="text" name="post_repair" class="form-control phone"
							value="{{ old('post_repair') }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="date"> @lang('equicare.date') </label>
							<input type="text" name="date" class="form-control phone"
							value="{{ old('date') }}" />
						</div>
	
						<div class="form-group">
						<div class="d-flex flex-column align-items-start">
							<label for="device" class="mb-6">جهاز المعايرة:</label>
							{{-- <div class="d-flex align-items-center">
								<input type="radio" name="device" value="Ventilator" class="custom-radio mr-2 Ventilator ">
								<label for="device" class="mr-3 Ventilator "> Ventilator</label>
								<input type="radio" name="device" value="Infant incubator" class="custom-radio mr-2 Infant incubator" >
								<label for="device" class="mr-3 Infant incubator"> Infant incubator </label>
							</div> 
						</div> --}}
						<div class="form-group col-md-4 ">
							<label for="device" class="mb-6">جهاز المعايرة:</label>
							{!! Form::select('reasons_stopping', [
								'Infant incubator' => __("Infant incubator"),
								'Ventilator' => __("Ventilator"),

							], null, ['placeholder' => '--select--', 'class' => 'form-control', 'id' => 'reasons_stopping']) !!}


						<div class="d-flex align-items-center">
							<input type="radio" name="device" value="Ventilator" class="custom-radio mr-2 Ventilator">
							<label for="device" class="mr-3 Ventilator"> Ventilator</label>
							<input type="radio" name="device" value="Infant incubator" class="custom-radio mr-2 Infant incubator">
							<label for="device" class="mr-3 Infant incubator"> Infant incubator </label>
						</div>
						</div>

						{{-- @extends('layouts.app')

						@section('content') --}}
						
						<div class="container">
							{{-- <h1>Add Physical Condition</h1> --}}

							{{-- {!! Form::open(['route' => 'physical_conditions.store']) !!} --}}
						
							<div class="form-group">
								{!! Form::label('device_clean_decontaminated', 'Device Clean/Decontaminated') !!}
								<div class="form-check">
									{!! Form::radio('device_clean_decontaminated', 'Pass', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('device_clean_decontaminated_pass', 'Pass', ['class' => 'form-check-label']) !!}
								</div>
								<div class="form-check">
									{!! Form::radio('device_clean_decontaminated', 'Fail', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('device_clean_decontaminated_fail', 'Fail', ['class' => 'form-check-label']) !!}
								</div>
								<div class="form-check">
									{!! Form::radio('device_clean_decontaminated', 'N/A', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('device_clean_decontaminated_na', 'N/A', ['class' => 'form-check-label']) !!}
								</div>
							</div>
					

							<div class="form-group">
								
								{!! Form::label('no_physical_damage', 'No Physical Damage') !!}
								<div class="form-check">
									{!! Form::radio('no_physical_damage', 'Pass', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('no_physical_damage_pass', 'Pass', ['class' => 'form-check-label']) !!}
								</div>
								<div class="form-check">
									{!! Form::radio('no_physical_damage', 'Fail', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('no_physical_damage_fail', 'Fail', ['class' => 'form-check-label']) !!}
								</div>
								<div class="form-check">
									{!! Form::radio('no_physical_damage', 'N/A', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('no_physical_damage_na', 'N/A', ['class' => 'form-check-label']) !!}
								</div>
							</div>

			
							<div class="form-group">
								{!! Form::label('switches_controls_operable', 'Switches and Controls Operable') !!}
								<div class="form-check">
									{!! Form::radio('switches_controls_operable', 'Pass', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('switches_controls_operable_pass', 'Pass', ['class' => 'form-check-label']) !!}
								</div>
								<div class="form-check">
									{!! Form::radio('switches_controls_operable', 'Fail', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('switches_controls_operable_fail', 'Fail', ['class' => 'form-check-label']) !!}
								</div>
								<div class="form-check">
									{!! Form::radio('switches_controls_operable', 'N/A', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('switches_controls_operable_na', 'N/A', ['class' => 'form-check-label']) !!}
								</div>
							</div>
						
							<div class="form-group">
								{!! Form::label('display_intensity_adequate', 'Display Intensity Adequate') !!}
								<div class="form-check">
									{!! Form::radio('display_intensity_adequate', 'Pass', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('display_intensity_adequate_pass', 'Pass', ['class' => 'form-check-label']) !!}
								</div>
								<div class="form-check">
									{!! Form::radio('display_intensity_adequate', 'Fail', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('display_intensity_adequate_fail', 'Fail', ['class' => 'form-check-label']) !!}
								</div>
								<div class="form-check">
									{!! Form::radio('display_intensity_adequate', 'N/A', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('display_intensity_adequate_na', 'N/A', ['class' => 'form-check-label']) !!}
								</div>
							</div>
						
							<div class="form-group">
								{!! Form::label('control_labeling_present', 'Control Labeling Present') !!}
								<div class="form-check">
									{!! Form::radio('control_labeling_present', 'Pass', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('control_labeling_present_pass', 'Pass', ['class' => 'form-check-label']) !!}
								</div>
								<div class="form-check">
									{!! Form::radio('control_labeling_present', 'Fail', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('control_labeling_present_fail', 'Fail', ['class' => 'form-check-label']) !!}
								</div>
								<div class="form-check">
									{!! Form::radio('control_labeling_present', 'N/A', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('control_labeling_present_na', 'N/A', ['class' => 'form-check-label']) !!}
								</div>
							</div>
						
							<div class="form-group">
								{!! Form::label('hoses_inlets_available', 'Hoses and Inlets Available') !!}
								<div class="form-check">
									{!! Form::radio('hoses_inlets_available', 'Pass', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('hoses_inlets_available_pass', 'Pass', ['class' => 'form-check-label']) !!}
								</div>
								<div class="form-check">
									{!! Form::radio('hoses_inlets_available', 'Fail', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('hoses_inlets_available_fail', 'Fail', ['class' => 'form-check-label']) !!}
								</div>
								<div class="form-check">
									{!! Form::radio('hoses_inlets_available', 'N/A', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('hoses_inlets_available_na', 'N/A', ['class' => 'form-check-label']) !!}
								</div>
							</div>
						
							<div class="form-group">
								{!! Form::label('power_cord_accessories_intact', 'Power Cord and Accessories Intact') !!}
								<div class="form-check">
									{!! Form::radio('power_cord_accessories_intact', 'Pass', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('power_cord_accessories_intact_pass', 'Pass', ['class' => 'form-check-label']) !!}
								</div>

								<div class="form-check">
									{!! Form::radio('power_cord_accessories_intact', 'N/A', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('power_cord_accessories_intact_na', 'N/A', ['class' => 'form-check-label']) !!}
								</div>
								<div class="form-check">
									{!! Form::radio('power_cord_accessories_intact', 'Fail', null, ['class' => 'form-check-input']) !!}
									{!! Form::label('power_cord_accessories_intact_Fail', 'Fail', ['class' => 'form-check-label']) !!}
								</div>
	
								<div class="form-group">
									{!! Form::label('filters_vents_clean', 'Filters and vents clean') !!}
									<div class="form-check">
										{!! Form::radio('filters_vents_clean', 'Pass', null, ['class' => 'form-check-input']) !!}
										{!! Form::label('filters_vents_clean_pass', 'Pass', ['class' => 'form-check-label']) !!}
									</div>
	
									<div class="form-check">
										{!! Form::radio('filters_vents_clean', 'N/A', null, ['class' => 'form-check-input']) !!}
										{!! Form::label('filters_vents_clean_na', 'N/A', ['class' => 'form-check-label']) !!}
									</div>
									<div class="form-check">
										{!! Form::radio('filters_vents_clean', 'Fail', null, ['class' => 'form-check-input']) !!}
										{!! Form::label('filters_vents_clean_Fail', 'Fail', ['class' => 'form-check-label']) !!}
									</div>

									<div class="form-group">
										{!! Form::label('test_result', 'test result    ') !!}
										<div class="form-check">
											{!! Form::radio('test_result', 'Pass', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('test_result_pass', 'Pass', ['class' => 'form-check-label']) !!}
										</div>
		
										<div class="form-check">
											{!! Form::radio('test_result', 'N/A', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('test_result_na', 'N/A', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('test_result', 'Fail', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('test_result_Fail', 'Fail', ['class' => 'form-check-label']) !!}
										</div>
									</div
									>
										<div class="form-group">
											{!! Form::label('ground_wire_resistance', 'ground wire resistance') !!}
											{!! Form::text('ground_wire_resistance', null, ['class' => 'form-control']) !!}
										</div>
										
										<div class="form-group">
											{!! Form::label('chassis_leakage', ' chassis leakage current') !!}
											{!! Form::text('chassis_leakage', null, ['class' => 'form-control']) !!}
										</div>
										
										<div class="form-group">
											{!! Form::label('patient_leakage_current', 'patient leakage current') !!}
											{!! Form::text('patient_leakage_current', null, ['class' => 'form-control']) !!}
										</div>
										

									{{-- <div class="form-group">
										{!! Form::label('ground_wire_resistance', 'Ground Wire Resistance') !!}
										<div class="form-check">
											{!! Form::radio('ground_wire_resistance', 'Pass', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('ground_wire_resistance_pass', 'Pass', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('ground_wire_resistance', 'Fail', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('ground_wire_resistance_fail', 'Fail', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('ground_wire_resistance', 'N/A', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('ground_wire_resistance_na', 'N/A', ['class' => 'form-check-label']) !!}
										</div>
									</div>
									 --}}
									{{-- <div class="form-group">
										{!! Form::label('chassis_leakage_current', 'Chassis Leakage Current') !!}
										<div class="form-check">
											{!! Form::radio('chassis_leakage_current', 'Pass', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('chassis_leakage_current_pass', 'Pass', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('chassis_leakage_current', 'Fail', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('chassis_leakage_current_fail', 'Fail', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('chassis_leakage_current', 'N/A', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('chassis_leakage_current_na', 'N/A', ['class' => 'form-check-label']) !!}
										</div>
									</div> --}}
{{-- 									
									<div class="form-group">
										{!! Form::label('patient_leakage_current', 'Patient Leakage Current') !!}
										<div class="form-check">
											{!! Form::radio('patient_leakage_current', 'Pass', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('patient_leakage_current_pass', 'Pass', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('patient_leakage_current', 'Fail', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('patient_leakage_current_fail', 'Fail', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('patient_leakage_current', 'N/A', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('patient_leakage_current_na', 'N/A', ['class' => 'form-check-label']) !!}
										</div>
									</div> --}}
									
									<div class="form-group">
										{!! Form::label('ground_wire_presence', 'Ground Wire Presence') !!}
										<div class="form-check">
											{!! Form::radio('ground_wire_presence', 'Pass', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('ground_wire_presence_pass', 'Pass', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('ground_wire_presence', 'Fail', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('ground_wire_presence_fail', 'Fail', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('ground_wire_presence', 'N/A', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('ground_wire_presence_na', 'N/A', ['class' => 'form-check-label']) !!}
										</div>
									</div>
									
									<div class="form-group">
										{!! Form::label('ground_to_neutral_voltage', 'Ground to Neutral Voltage') !!}
										<div class="form-check">
											{!! Form::radio('ground_to_neutral_voltage', 'Pass', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('ground_to_neutral_voltage_pass', 'Pass', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('ground_to_neutral_voltage', 'Fail', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('ground_to_neutral_voltage_fail', 'Fail', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('ground_to_neutral_voltage', 'N/A', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('ground_to_neutral_voltage_na', 'N/A', ['class' => 'form-check-label']) !!}
										</div>
									</div>


									<div class="form-group">
										{!! Form::label('ground_to_line_voltage', 'Ground to Line Voltage') !!}
										<div class="form-check">
											{!! Form::radio('ground_to_line_voltage', 'Pass', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('ground_to_line_voltage_pass', 'Pass', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('ground_to_line_voltage', 'Fail', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('ground_to_line_voltage_fail', 'Fail', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('ground_to_line_voltage', 'N/A', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('ground_to_line_voltage_na', 'N/A', ['class' => 'form-check-label']) !!}
										</div>
									</div>
									<div class="form-group">
										{!! Form::label('clean_cooling_vents_and_filters', 'Clean Cooling Vents and Filters') !!}
										<div class="form-check">
											{!! Form::radio('clean_cooling_vents_and_filters', 'Pass', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('clean_cooling_vents_and_filters_pass', 'Pass', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('clean_cooling_vents_and_filters', 'Fail', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('clean_cooling_vents_and_filters_fail', 'Fail', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('clean_cooling_vents_and_filters', 'N/A', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('clean_cooling_vents_and_filters_na', 'N/A', ['class' => 'form-check-label']) !!}
										</div>
									</div>
								
									<div class="form-group">
										{!! Form::label('Inspect_and_clean_ducts_heater_and_fans', 'Inspect and Clean Ducts, Heater and Fans') !!}
										<div class="form-check">
											{!! Form::radio('Inspect_and_clean_ducts_heater_and_fans', 'Pass', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Inspect_and_clean_ducts_heater_and_fans_pass', 'Pass', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('Inspect_and_clean_ducts_heater_and_fans', 'Fail', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Inspect_and_clean_ducts_heater_and_fans_fail', 'Fail', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('Inspect_and_clean_ducts_heater_and_fans', 'N/A', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Inspect_and_clean_ducts_heater_and_fans_na', 'N/A', ['class' => 'form-check-label']) !!}
										</div>
									</div>
								
									<div class="form-group">
										{!! Form::label('Inspect_gaskets_for_signs_of_deterioration', 'Inspect Gaskets for Signs of Deterioration') !!}
										<div class="form-check">
											{!! Form::radio('Inspect_gaskets_for_signs_of_deterioration', 'Pass', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Inspect_gaskets_for_signs_of_deterioration_pass', 'Pass', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('Inspect_gaskets_for_signs_of_deterioration', 'Fail', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Inspect_gaskets_for_signs_of_deterioration_fail', 'Fail', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('Inspect_gaskets_for_signs_of_deterioration', 'N/A', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Inspect_gaskets_for_signs_of_deterioration_na', 'N/A', ['class' => 'form-check-label']) !!}
										</div>
									</div>
								
									<div class="form-group">
										{!! Form::label('Inspect_port_closures_and_port_sleeves', 'Inspect Port Closures and Port Sleeves') !!}
										<div class="form-check">
											{!! Form::radio('Inspect_port_closures_and_port_sleeves', 'Pass', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Inspect_port_closures_and_port_sleeves_pass', 'Pass', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('Inspect_port_closures_and_port_sleeves', 'Fail', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Inspect_port_closures_and_port_sleeves_fail', 'Fail', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('Inspect_port_closures_and_port_sleeves', 'N/A', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Inspect_port_closures_and_port_sleeves_na', 'N/A', ['class' => 'form-check-label']) !!}
										</div>
									</div>
								
									<div class="form-group">
										{!! Form::label('Replace_battery_every_24_months', 'Replace Battery Every 24 Months') !!}
										<div class="form-check">
											{!! Form::radio('Replace_battery_every_24_months', 'Pass', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Replace_battery_every_24_months_pass', 'Pass', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('Replace_battery_every_24_months', 'Fail', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Replace_battery_every_24_months_fail', 'Fail', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('Replace_battery_every_24_months', 'N/A', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Replace_battery_every_24_months_na', 'N/A', ['class' => 'form-check-label']) !!}
										</div>
									</div>
								
									<div class="form-group">
										{!! Form::label('Complete_model_specific_preventive_maintenance', 'Complete Model Specific Preventive Maintenance') !!}
										<div class="form-check">
											{!! Form::radio('Complete_model_specific_preventive_maintenance', 'Pass', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Complete_model_specific_preventive_maintenance_pass', 'Pass', ['class' => 'form-check-label']) !!}
										</div>

										<div class="form-check">
											{!! Form::radio('Complete_model_specific_preventive_maintenance', 'Fail', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Complete_model_specific_preventive_maintenance_fail', 'Fail', ['class' => 'form-check-label']) !!}
										</div>
										<div class="form-check">
											{!! Form::radio('Complete_model_specific_preventive_maintenance', 'N/A', null, ['class' => 'form-check-input']) !!}
											{!! Form::label('Complete_model_specific_preventive_maintenance_na', 'N/A', ['class' => 'form-check-label']) !!}
										</div>
{{-- jddkas adsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss --}}

										<div class="form-group">
											{!! Form::label('verifies_battery_operation', 'Verifies Battery Operation') !!}
											<div class="form-check">
												{!! Form::radio('verifies_battery_operation', 'Pass', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('verifies_battery_operation_pass', 'Pass', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('verifies_battery_operation', 'Fail', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('verifies_battery_operation_fail', 'Fail', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('verifies_battery_operation', 'N/A', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('verifies_battery_operation_na', 'N/A', ['class' => 'form-check-label']) !!}
											</div>
										</div>
										
										<div class="form-group">
											{!! Form::label('fan_operation', 'Fan Operation') !!}
											<div class="form-check">
												{!! Form::radio('fan_operation', 'Pass', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('fan_operation_pass', 'Pass', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('fan_operation', 'Fail', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('fan_operation_fail', 'Fail', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('fan_operation', 'N/A', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('fan_operation_na', 'N/A', ['class' => 'form-check-label']) !!}
											</div>
										</div>
										
										<div class="form-group">
											{!! Form::label('warm_up_time', ' warm up time') !!}
											<div class="form-check">
												{!! Form::radio('warm_up_time', 'Pass', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('warm_up_time_pass', 'Pass', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('warm_up_time', 'Fail', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('warm_up_time_fail', 'Fail', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('warm_up_time', 'N/A', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('warm_up_time_na', 'N/A', ['class' => 'form-check-label']) !!}
											</div>
										</div>
										<div class="form-group">
											{!! Form::label('air_temperature_accuracy', ' air temperature accuracy') !!}
											<div class="form-check">
												{!! Form::radio('air_temperature_accuracy', 'Pass', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('air_temperature_accuracy_pass', 'Pass', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('air_temperature_accuracy', 'Fail', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('air_temperature_accuracy_fail', 'Fail', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('air_temperature_accuracy', 'N/A', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('air_temperature_accuracy_na', 'N/A', ['class' => 'form-check-label']) !!}
											</div>
										</div>
										<div class="form-group">
											{!! Form::label('skin_temperature_accuracy', 'skin temperature accuracy') !!}
											<div class="form-check">
												{!! Form::radio('skin_temperature_accuracy', 'Pass', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('skin_temperature_accuracy_pass', 'Pass', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('skin_temperature_accuracy', 'Fail', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('skin_temperature_accuracy_fail', 'Fail', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('skin_temperature_accuracy', 'N/A', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('skin_temperature_accuracy_na', 'N/A', ['class' => 'form-check-label']) !!}
											</div>
										</div>
										<div class="form-group">
											{!! Form::label('temperature_overshoot', 'temperature overshoot ') !!}
											<div class="form-check">
												{!! Form::radio('temperature_overshoot', 'Pass', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('temperature_overshoot_pass', 'Pass', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('temperature_overshoot', 'Fail', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('temperature_overshoot_fail', 'Fail', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('temperature_overshoot', 'N/A', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('temperature_overshoot_na', 'N/A', ['class' => 'form-check-label']) !!}
											</div>
										</div>
										<div class="form-group">
											{!! Form::label('relative_humidity', 'relative humidity ') !!}
											<div class="form-check">
												{!! Form::radio('relative_humidity', 'Pass', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('relative_humidity_pass', 'Pass', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('relative_humidity', 'Fail', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('relative_humidity_fail', 'Fail', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('relative_humidity', 'N/A', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('relative_humidity_na', 'N/A', ['class' => 'form-check-label']) !!}
											</div>
										</div>
										<div class="form-group">
											{!! Form::label('air_flow', 'air_flow') !!}
											<div class="form-check">
												{!! Form::radio('air_flow', 'Pass', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('air_flow_pass', 'Pass', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('air_flow', 'Fail', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('air_flow_fail', 'Fail', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('air_flow', 'N/A', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('air_flow_na', 'N/A', ['class' => 'form-check-label']) !!}
											</div>
										</div>
										<div class="form-group">
											{!! Form::label('air_temperature_alarms', 'air temperature alarms') !!}
											<div class="form-check">
												{!! Form::radio('air_temperature_alarms', 'Pass', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('air_temperature_alarms_pass', 'Pass', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('air_temperature_alarms', 'Fail', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('air_temperature_alarms_fail', 'Fail', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('air_temperature_alarms', 'N/A', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('air_temperature_alarms_na', 'N/A', ['class' => 'form-check-label']) !!}
											</div>
										</div>
										<div class="form-group">
											{!! Form::label('skin_temperature_alarms', 'skin temperature alarms') !!}
											<div class="form-check">
												{!! Form::radio('skin_temperature_alarms', 'Pass', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('skin_temperature_alarms_pass', 'Pass', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('skin_temperature_alarms', 'Fail', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('skin_temperature_alarms_fail', 'Fail', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('skin_temperature_alarms', 'N/A', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('skin_temperature_alarms_na', 'N/A', ['class' => 'form-check-label']) !!}
											</div>
										</div>

										<div class="form-group">
											{!! Form::label('high_temperature_protection', 'high temperature protection') !!}
											<div class="form-check">
												{!! Form::radio('high_temperature_protection', 'Pass', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('high_temperature_protection_pass', 'Pass', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('high_temperature_protection', 'Fail', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('high_temperature_protection_fail', 'Fail', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('high_temperature_protection', 'N/A', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('high_temperature_protection_na', 'N/A', ['class' => 'form-check-label']) !!}
											</div>
											{{-- <div class="form-group">
												{!! Form::label('normal_noise_level', 'normal noise level') !!}
												<div class="form-check">
													{!! Form::radio('normal_noise_level', 'Pass', null, ['class' => 'form-check-input']) !!}
													{!! Form::label('normal_noise_level_pass', 'Pass', ['class' => 'form-check-label']) !!}
												</div>
												<div class="form-check">
													{!! Form::radio('normal_noise_level', 'Fail', null, ['class' => 'form-check-input']) !!}
													{!! Form::label('normal_noise_level_fail', 'Fail', ['class' => 'form-check-label']) !!}
												</div>
												<div class="form-check">
													{!! Form::radio('normal_noise_level', 'N/A', null, ['class' => 'form-check-input']) !!}
													{!! Form::label('normal_noise_level_na', 'N/A', ['class' => 'form-check-label']) !!}
												</div>
												<div class="form-group">
													{!! Form::label('alarm_noise_level_low', 'alarm noise level low') !!}
													<div class="form-check">
														{!! Form::radio('alarm_noise_level_low', 'Pass', null, ['class' => 'form-check-input']) !!}
														{!! Form::label('alarm_noise_level_low_pass', 'Pass', ['class' => 'form-check-label']) !!}
													</div>
													<div class="form-check">
														{!! Form::radio('alarm_noise_level_low', 'Fail', null, ['class' => 'form-check-input']) !!}
														{!! Form::label('alarm_noise_level_low_fail', 'Fail', ['class' => 'form-check-label']) !!}
													</div>
													<div class="form-check">
														{!! Form::radio('alarm_noise_level_low', 'N/A', null, ['class' => 'form-check-input']) !!}
														{!! Form::label('alarm_noise_level_low_na', 'N/A', ['class' => 'form-check-label']) !!}
													</div>
													<div class="form-group">
														{!! Form::label('alarm_noise_level_high', 'alarm noise level high') !!}
														<div class="form-check">
															{!! Form::radio('alarm_noise_level_high', 'Pass', null, ['class' => 'form-check-input']) !!}
															{!! Form::label('alarm_noise_level_high_pass', 'Pass', ['class' => 'form-check-label']) !!}
														</div>
														<div class="form-check">
															{!! Form::radio('alarm_noise_level_high', 'Fail', null, ['class' => 'form-check-input']) !!}
															{!! Form::label('alarm_noise_level_high_fail', 'Fail', ['class' => 'form-check-label']) !!}
														</div>
														<div class="form-check">
															{!! Form::radio('alarm_noise_level_high', 'N/A', null, ['class' => 'form-check-input']) !!}
															{!! Form::label('alarm_noise_level_high_na', 'N/A', ['class' => 'form-check-label']) !!}
														</div> --}}
														<div class="form-group">
															{!! Form::label('noiseLevel', 'noise Level') !!}
															{!! Form::text('noise_Level', null, ['class' => 'form-control']) !!}
														</div>
				
														<div class="form-group">
															{!! Form::label('alarm_function', 'alarm function') !!}
															<div class="form-check">
																{!! Form::radio('alarm_function', 'Pass', null, ['class' => 'form-check-input']) !!}
																{!! Form::label('alarm_function_pass', 'Pass', ['class' => 'form-check-label']) !!}
															</div>
															<div class="form-check">
																{!! Form::radio('alarm_function', 'Fail', null, ['class' => 'form-check-input']) !!}
																{!! Form::label('alarm_function_fail', 'Fail', ['class' => 'form-check-label']) !!}
															</div>
															<div class="form-check">
																{!! Form::radio('alarm_function', 'N/A', null, ['class' => 'form-check-input']) !!}
																{!! Form::label('alarm_function_na', 'N/A', ['class' => 'form-check-label']) !!}
															</div>
																<div class="form-group col-md-4">
	
					

										<!-- Repeat the above structure for the remaining fields -->
										
										<div class="form-group">
											{!! Form::label('complete_model_testing', 'Complete Model Testing') !!}
											<div class="form-check">
												{!! Form::radio('complete_model_testing', 'Pass', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('complete_model_testing_pass', 'Pass', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('complete_model_testing', 'Fail', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('complete_model_testing_fail', 'Fail', ['class' => 'form-check-label']) !!}
											</div>
											<div class="form-check">
												{!! Form::radio('complete_model_testing', 'N/A', null, ['class' => 'form-check-input']) !!}
												{!! Form::label('complete_model_testing_na', 'N/A', ['class' => 'form-check-label']) !!}
											</div>
										</div>
										
														   {{-- {{-- <div class="form-group col-md-4">
															<label>حالة المعايرة</label>
															<div class="radio iradio">
																<label class="login-padding">
																	{!! Form::radio('physical_condition', ' Infant incubator')!!} @lang('equicare. Infant incubator')
																</label>
																<label>
																	{!! Form::radio('physical_condition', 'Ventilator',null,['id'=>'Ventilator'])!!} @lang('equicare.Ventilator')
																</label> --}}
															{{-- </div>
														</div> --}}  
														{{-- <div class="form-group col-md-4">
															<label>حالة المعايرة</label>
															<div class="radio iradio">
															  <label class="login-padding">
																{!! Form::radio('physical_condition', 'Infant incubator', null, ['onclick' => 'togglePanel(false)']) !!} @lang('equicare. Infant incubator')
															  </label>
															  <label>
																{!! Form::radio('physical_condition', 'Ventilator', null, ['id' => 'Ventilator', 'onclick' => 'togglePanel(true)']) !!} @lang('equicare.Ventilator')
															  </label>
															</div>
														</div>  --}}
														{{-- <div class="form-group col-md-4 report_no none-display"> --}}
													{{-- <script>
$(document).ready(function() {
    $('#Ventilator').change(function() {
        var Value = $(this).val();
        var equipmentStopsDateTimeContainer = $('.my-panel');
        var reasonsStoppingContainer = $('.reasons_stopping_container');

        if (Value === 'Ventilator') {
            equipmentStopsDateTimeContainer.show();
            // reasonsStoppingContainer.show();
        } else {
            equipmentStopsDateTimeContainer.hide();
            reasonsStoppingContainer.hide();
        }
    });
}); --}}
   {{-- <input type="hidden" name="department_id" id="department_id" value="{{old('department_id')}}" />
   <input type="submit" value="@lang('equicare.submit')" class="btn btn-primary btn-flat"> --}}


						 
						                        <div class="form-group col-md-12">
							<input type="submit" value="@lang('equicare.submit')" class="btn btn-primary btn-flat"/>
						</div>
				
					</form>
				</div>

			</div>
		</div>
	</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/datetimepicker.js') }}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.unique_id_select2').select2({
	placeholder: '{{__("equicare.select_option")}}',
	allowClear: true
	});
	$('.hospital_select2').select2({
		placeholder: '{{__("equicare.select_option")}}',
		allowClear: true
	});
	$('.department_select2').select2({
		placeholder: '{{__("equicare.select_option")}}',
		allowClear: true
	});
	$('.governorate_id_select2').select2({
		placeholder: '{{__("equicare.select_option")}}',
		allowClear: true
	});

	$('.directorate_id_select2').select2({
		placeholder: '{{__("equicare.select_option")}}',
		allowClear: true
	});

	$('.type_of_healthfacility_id_select2').select2({
		placeholder: '{{__("equicare.select_option")}}',
		allowClear: true
	});


	if($('#external').attr('checked') =='checked'){
			$('.report_no').css('display','block');
	}
	$('#external').on('ifChecked ifUnchecked',function(e){
		if(e.type == 'ifChecked'){
			$('.report_no').show();
		}else{
			$('.report_no').hide();
		}
	})

});
@if ($errors->any())
		
const setSelectValues = () => {
	if ("{{ old('hospital_id') }}") {
		$('.hospital_select2').val("{{ old('hospital_id') }}").trigger('change'); 
	}   
	if ("{{ old('department_id') }}" && "{{ old('hospital_id') }}" == '') {
		$('.department_select2').val("{{ old('department_id') }}").trigger('change'); 
	}   
	if ("{{ old('equip_id') }}" && "{{ old('hospital_id') }}" == '' && "{{ old('department_id') }}" == '') {
		$('.unique_id_select2').val("{{ old('equip_id') }}").trigger('change');  
	}  
};
		setTimeout(() => {
		setSelectValues();
}, 500);
@endif
$('.next_due_date').datepicker({
	todayHighlight: true,
	format:"{{env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')}}",
})
$('.call_register_date_time').datetimepicker({
	sideBySide: true,
format: 'YYYY-MM-DD HH:mm:ss'

})
$('.unique_id_select2').on('change',function(){
var value = $(this).val();
$('#equip_id').val(value);
var equip_name = $('.equip_name');
var hospitals = $('.hospital_select2');
var sr_no = $('.sr_no');
var company = $('.company');
var model = $('.model');
var production_date=$('.production_date');
var Donor=$('.Donor');
var name_donors=$('.name_donors');
var phone_donors=$('.phone_donors');
var provenance=$('.provenance');
var	governorate=$('.governorate')
var	directorate=$('.directorate')
var	type_of_healthfacilityS=$('.type_of_healthfacilityS')
var model_number=$('.model_number');
var Location=$('.Location');
var Manufacturer=$('.Manufacturer');
var hospital=$('.hospital');



var department = $('.department_select2');
if(value==""){
	equip_name.val("");
	sr_no.val("");
	company.val("");
	model.val("");
	department.val("");
	production_date.val("");
	Donor.val("");
	name_donors.val("");
	phone_donors.val("");
	provenance.val("");
	governorate.val("");
	directorate.val("");
	model_number.val("");
	Location.val("");
	Manufacturer.val("");
	hospital.val("");


	type_of_healthfacilityS.val("");
}
if(value !=""){
	$.ajax({
		url : "{{ url('unique_id_preventive')}}" ,
		type : 'get',

		data:{'id' : value },
		success:function(data){
				// console.log(data);
				equip_name.val(data.success.name);
				hospitals.val(data.success.hospital_id);
				sr_no.val(data.success.sr_no);
				company.val(data.success.company);
				model.val(data.success.model);
				department.val(data.success.department);
				production_date.val(data.success.production_date);
				provenance.val(data.success.provenance);
				governorate.val(data.success.governorate);
				directorate.val(data.success.directorate);
				type_of_healthfacilityS.val(data.success.type_of_healthfacilityS);
				model_number.val(data.success.model_number);
				Location.val(data.success.Location);
				Manufacturer.val(data.success.Manufacturer);
				hospital.val(data.success.hospital);

				Donor.val(data.success.Donor);
				name_donors.val(data.success.name_donors);
				phone_donors.val(data.success.phone_donors);


				new PNotify({
					title: ' Success!',
					text: "{{__('equicare.equipment_data_fetched')}}",
					type: 'success',
					delay: 3000,
					nonblock: {
						nonblock: true
					}
				});

				$('.unique_id_select2').select2({
					placeholder: '{{__("equicare.select_option")}}',
					allowClear: true
				});
				$('.hospital_select2').select2({
					placeholder: '{{__("equicare.select_option")}}',
					allowClear: true
				});
				$('.department_select2').select2({
					placeholder: '{{__("equicare.select_option")}}',
					allowClear: true
				});

			}
		});
}
});

$('.hospital_select2').on('change',function(){
// console.log($(this).val());
var value = $(this).val();
$('#hospital_id').val(value);
		var equip_name = $('.equip_name');
		var hospitals = $('.hospital_select2');
		var department = $('.department_select2');
		var unique_id = $('.unique_id_select2');
		var sr_no = $('.sr_no');
		var company = $('.company');
		var model = $('.model');
		var production_date=$('.production_date');
		var Donor=$('.Donor');
		var name_donors=$('.name_donors');
		var phone_donors=$('.phone_donors');
		var provenance=$('.provenance');
		var model_number=$('.model_number');
		var Location=$('.Location');
		var Manufacturer=$('.Manufacturer');
		var hospital=$('.hospital');



		if(value==""){
			equip_name.val("");
			sr_no.val("");
			company.val("");
			model.val("");
			department.val("");
			production_date.val("");
			Donor.val("");
			name_donors.val("");
			phone_donors.val("");
			provenance.val("");
			model_number.val("");
			Location.val("");
			Manufacturer.val("");
			hospital.val("");

			unique_id.trigger("change");
			unique_id.val("");

		}
		if(value !=""){
			$.ajax({
				url : "{{ url('hospital_preventive')}}" ,
				type : 'get',

				data:{'id' : value },
				success:function(data){
					console.log(data);
					department.empty();
					unique_id.empty();
				if (data.department) {
					department.append(
						'<option value=""></option>'
						);
					$.each(data.department,function(k,v){
						department.append(
							'<option value="'+k+'">'+v+'</option>'
							);
					});
				}

				if (data.unique_id) {
					unique_id.append(
						'<option value=""></option>'
						);
					$.each(data.unique_id,function(k,v){
						unique_id.append(
							'<option value="'+k+'">'+v+'</option>'
							);
					});
				}
			 $('.unique_id_select2').select2({
				 placeholder: '{{__("equicare.select_option")}}',
				 allowClear: true
			 });
			 $('.hospital_select2').select2({
				 placeholder: '{{__("equicare.select_option")}}',
				 allowClear: true
			 });
			 $('.department_select2').select2({
				 placeholder: '{{__("equicare.select_option")}}',
				 allowClear: true
			 });
				 if ("{{ old('department_id') }}") {
		$('.department_select2').val("{{ old('department_id') }}").trigger('change'); 
	} 

		 }
		});
		}
	});


$('.department_select2').on('change',function(){
var value = $(this).val();
$('#department_id').val(value);
		var equip_name = $('.equip_name');
		var hospitals = $('.hospital_select2');

		var unique_id = $('.unique_id_select2');
		var sr_no = $('.sr_no');
		var company = $('.company');
		var model = $('.model');
		var production_date=$('.production_date');
		var Donor=$('.Donor');
		var name_donors=$('.name_donors');
		var phone_donors=$('.phone_donors');
		var provenance=$('.provenance');
		var model_number=$('.model_number');
		var Location=$('.Location');
		var Manufacturer=$('.Manufacturer');
		// var provenance=$('.provenance');
		var hospital=$('.hospital');


		if(value==""){
			equip_name.val("");
			sr_no.val("");
			company.val("");
			model.val("");
			production_date.val("");
			Donor.val("");
			name_donors.val("");
			phone_donors.val("");
			provenance.val("");
			model_number.val("");
			Location.val("");
			Manufacturer.val("");
			hospital.val("");



			$(this).val("");
			unique_id.trigger("change");
			unique_id.val("");

		}
		if(value !=""){
			$.ajax({
				url : "{{ url('department_preventive')}}" ,
				type : 'get',

				data:{
					'department' : value,
					'hospital_id':hospitals.val()
				},
				success:function(data){
				 unique_id.empty();

				if (data.unique_id) {
					unique_id.append(
						'<option value=""></option>'
						);
					$.each(data.unique_id,function(k,v){
						unique_id.append(
							'<option value="'+k+'">'+v+'</option>'
							);
					});
				}

			 $('.unique_id_select2').select2({
				 placeholder: '{{__("equicare.select_option")}}',
				 allowClear: true
			 });
			 $('.hospital_select2').select2({
				 placeholder: '{{__("equicare.select_option")}}',
				 allowClear: true
			 });
			 $('.department_select2').select2({
				 placeholder: '{{__("equicare.select_option")}}',
				 allowClear: true
			 });
				 if ("{{ old('equip_id') }}") {
		$('.unique_id_select2').val("{{ old('equip_id') }}").trigger('change');  
		   }  

		 }
		});
		}
	});


						$(document).ready(function() {
							$('#reasons_stopping').change(function() {
								var selectedValue = $(this).val();
								var equipmentStopsDateTimeContainer = $('.container');
								var reasonsStoppingContainer = $('.reasons_stopping_container');
						
								if (selectedValue === 'Ventilator') {
									equipmentStopsDateTimeContainer.show();
									reasonsStoppingContainer.show();
								} else {
									equipmentStopsDateTimeContainer.hide();
									reasonsStoppingContainer.hide();
								}
							});
						});
</script>
@endsection

