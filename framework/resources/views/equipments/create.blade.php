	@extends('layouts.admin')
	@section('body-title')
		@lang('equicare.equipments')
	@endsection
	@section('title')
		| @lang('equicare.equipments')
	@endsection
	@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{ url('admin/equipments') }}">@lang('equicare.equipments') </a></li>
	<li class="active">@lang('equicare.create')</li>
	@endsection
	@section('content')
	{{-- <style>
.container {
  display: table;
  width: 100%;
  border-collapse: separate;
  border-spacing: 0 10px;
}

.input-group {
  display: table-row;
}

.input-group input, .input-group button {
  display: table-cell;
  vertical-align: middle;
}

.input-group input {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
}

.input-group button {
  background-color: #f44336;
  color: white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
}	  </style> --}}
	  <style>
.container {
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
	margin: -5px;
  }
  
  .input-group {
	flex: 0 0 calc(30% - 10px);
	margin: 2px;
	display: flex;
	align-items: center;
  }
  
  .input-group input {
	flex-grow: 1;
	padding: 3px;
	border: 1px solid #ccc;
  }
  
  .input-group button {
	background-color: #f44336;
	color: white;
	border: none;
	padding: 5px 3px;
	cursor: pointer;
	margin-left: 10px;
  }
  </style>

		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title">@lang('equicare.create_equipments')</h4>
					</div>
					<div class="box-body ">
						@include ('errors.list')
						<form class="form" method="post" action="{{ route('equipments.store') }}">
							{{ csrf_field() }}
							{{ method_field('POST') }}
							<div class="row">
								{{-- <div class="form-group col-md-6">
									<label for="governorate"> @lang('equicare.Governorate') </label>
									{!! Form::select('governorate',$governorates??[],'governorate',['class'=>'form-control ','placeholder'=>'--select--']) !!}
								</div>
								<div class="form-group col-md-6">
									<label for="directorate"> @lang('equicare.directorate') </label>
									{!! Form::select('directorates',$directorates??[],null,['class'=>'form-control ','placeholder'=>'--select--']) !!}
								</div>
								<div class="form-group col-md-6">
									<label for="type_of_healthfcility"> @lang('equicare.type_of_healthfcility') </label>
									{!! Form::select('type_of_healthfacilityS',$type_of_healthfacilityS??[],null,['class'=>'form-control','placeholder'=>'--select--']) !!}
								</div> --}}
			
															{{-- <div class="form-group col-md-6">
								<label for="hospital_id"> @lang('equicare.Governorate') </label>
								<select name="governorate" class="form-control">
									<option value="">---select---</option>
									@if(isset($hospitals))
										@foreach ($hospitals as $hospital)
											<option value="{{ $hospital->governorate }}"
												{{ old('hospital_id')?'selected':'' }}
												>{{ $hospital->governorate }}
											</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="hospital_id"> @lang('equicare.directorate') </label>
								<select name="directorate" class="form-control">
									<option value="">---select---</option>
									@if(isset($hospitals))
										@foreach ($hospitals as $hospital)
											<option value="{{ $hospital->id }}"
												{{ old('directorate')?'selected':'' }}
												>{{ $hospital->directorate }}
											</option>
										@endforeach
									@endif
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="hospital_id"> @lang('equicare.type_of_healthfacility') </label>
								<select name="type_of_healthfcilityS" class="form-control">
									<option value="">---select---</option>
									@if(isset($hospitals))
										@foreach ($hospitals as $hospital)
											<option value="{{ $hospital->id }}"
												{{ old('type_of_healthfcilityS')?'selected':'' }}
												>{{ $hospital->type_of_healthfcilityS }}
											</option>
										@endforeach
									@endif
								</select>
							</div>  --}}
							<div class="form-group col-md-6">
								<label for="type_of_healthfacility"> @lang('equicare.Governorate')</label>
								<select name="governorate" id="governorate" class="form-control" placeholder='--select--' required>
									<option value="">-select--</option>
									@foreach ($governorates as $id => $name)
										<option value="{{ $name }}">{{ $name }}</option>
									@endforeach
								</select>
							</div>
						
							 <div class="form-group col-md-6">
								<label for="type_of_healthfacility"> @lang('equicare.directorate')</label>
								<select name="directorate" id="type_of_healthfacility" class="form-control" placeholder='--select--' required>
									<option value="">-select--</option>
									@foreach ($directorates as $id => $name)
										<option value="{{ $name }}">{{ $name }}</option>
									@endforeach
								</select>
							</div>
						
							 <div class="form-group col-md-6">
								<label for="type_of_healthfacility"> @lang('equicare.type_of_healthfcility')</label>
								<select name="type_of_healthfacilityS" id="type_of_healthfacility" class="form-control" placeholder='--select--' required>
									<option value="">-select--</option>
									@foreach ($type_of_healthfacilityS as $id => $name)
										<option value="{{ $name }}">{{ $name }}</option>
									@endforeach
								</select>
							</div>
						
							<div class="form-group col-md-6">
								<label for="hospital_id"> @lang('equicare.hospital') </label>
								<select name="hospital_id" class="form-control">
									<option value="">---select---</option>
									@if(isset($hospitals))
										@foreach ($hospitals as $hospital)
											<option value="{{ $hospital->id }}"
												{{ old('hospital_id')?'selected':'' }}
												>{{ $hospital->name }}
											</option>
										@endforeach
									@endif
								</select>
							</div>


							<div class="form-group col-md-6">
								<label for="department"> @lang('equicare.department') </label>
								{!! Form::select('department',$departments??[],null,['class'=>'form-control','placeholder'=>'--select--']) !!}
							</div>

							<div class="form-group col-md-6">
								<label for="name"> @lang('equicare.name') </label>
								<input type="text" name="name" class="form-control"
								value="{{ old('name') }}" />
							</div>
							<div class="form-group col-md-6">
								<label for="short_name"> @lang('equicare.short_name_eq') </label>
								<input type="text" name="short_name" class="form-control"
								value="{{ old('short_name') }}" />
							</div>
							{{-- <div class="form-group col-md-6">
								<label>@lang('equicare.Donor')</label>
								{!! Form::select('Donor', [
									'Governmental' => __("equicare.Governmental"),
									'Organizations and donors' => __("equicare.Organizations and donors"),
								], null, ['placeholder' => '--select--', 'class' => 'form-control', 'id' => 'Donor']) !!}
							</div>
	
							 <div class="form-group col-md-6">
								<label for="Donor"> @lang('equicare.name donors') </label>
								<input type="text" name="name_donors" class="form-control" id="name_donors"
								value="{{ old('name_donors') }}" />

								<div class="form-group col-md-6">
									<label for="Donor"> @lang('equicare.phone donors') </label>
									<input type="text" name="phone_donors" class="form-control" id="phone_donors"
									value="{{ old('phone_donors') }}" /> --}}
									<div class="form-group col-md-6">
										<label>@lang('equicare.Donor')</label>
										{!! Form::select('Donor', [
											'Governmental' => __("equicare.Governmental"),
											'Organizations and donors' => __("equicare.Organizations and donors"),
										], null, ['placeholder' => '--select--', 'class' => 'form-control', 'id' => 'Donor']) !!}
									</div>
									
									<div class="form-group col-md-6 namee_donors">
										<label for="Donor">@lang('equicare.name donors')</label>
										<input type="text" name="name_donors" class="form-control" id="name_donors" value="{{ old('name_donors') }}" />
									</div>
									
									<div class="form-group col-md-6 phone_donors">
										<label for="Donor">@lang('equicare.phone donors')</label>
										<input type="text" name="phone_donors" class="form-control" id="phone_donors" value="{{ old('phone_donors') }}" />
									</div>
	

							</div>
							<div class="form-group col-md-6">
								<label for="provenance"> @lang('equicare.provenance') </label>
								<input type="text" name="provenance" class="form-control"
								value="{{ old('provenance') }}" />
							</div>

							{{-- <div class="form-group col-md-6">
								<label for="CATALOGUE"> @lang('equicare.CATALOGUE') </label>
								<input type="text" name="CATALOGUE" class="form-control"
								value="{{ old('CATALOGUE') }}" />
							</div> --}}

							<div class="form-group col-md-6">
								<label for="company"> @lang('equicare.company') </label>
								<input type="text" name="company" class="form-control"
								value="{{ old('company') }}" />
							</div>
							<div class="form-group col-md-6">
								<label for="model"> @lang('equicare.model') </label>
								<input type="text" name="model" class="form-control"
								value="{{ old('model') }}" />
							</div>

							<div class="form-group col-md-6">
								<label for="model_number"> @lang('equicare.model_number') </label>
								<input type="text" name="model_number" class="form-control"
								value="{{ old('sr_no') }}" />
							</div>

							<div class="form-group col-md-6">
								<label for="Location"> @lang('equicare.Location') </label>
								<input type="text" name="Location" class="form-control"
								value="{{ old('Location') }}" />
							</div>

							<div class="form-group col-md-6">
								<label for="Manufacturer"> @lang('equicare.Manufacturer') </label>
								<input type="text" name="Manufacturer" class="form-control"
								value="{{ old('Manufacturer') }}" />
							</div>




							<div class="form-group col-md-6">
								<label for="sr_no"> @lang('equicare.serial_number') </label>
								<input type="text" name="sr_no" class="form-control"
								value="{{ old('sr_no') }}" />
							</div>

							<div class="form-group col-md-6">
								<label for="date_of_purchase"> @lang('equicare.purchase_date') </label>
								<div class="input-group">

									<input type="text" id="date_of_purchase" name="date_of_purchase" class="form-control"
									value="{{ old('date_of_purchase') }}" />
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="order_date"> @lang('equicare.order_date') </label>
								<div class="input-group">

								<input type="text" id="order_date" name="order_date" class="form-control"
								value="{{ old('order_date') }}" />
								<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
								</span>
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="date_of_installation"> @lang('equicare.installation_date') </label>
								<div class="input-group">

								<input type="text" id="date_of_installation" name="date_of_installation" class="form-control"
								value="{{ old('date_of_installation') }}" />
								<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
								</span>
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="warranty_due_date"> @lang('equicare.production date') </label>
								<div class="input-group">

								<input type="text" id="production_date" name="production_date" class="form-control"
								value="{{ old('production_date') }}" />
								<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
								</span>
								</div>
							</div>

							<div class="form-group col-md-6">
								<label for="warranty_due_date"> @lang('equicare.warranty_due_date') </label>
								<div class="input-group">

								<input type="text" id="warranty_due_date" name="warranty_due_date" class="form-control"
								value="{{ old('warranty_due_date') }}" />
								<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
								</span>
								</div>
							</div>


							<div class="form-group col-md-6">
								<label for="service_engineer_no"> @lang('equicare.service_engineer_number')</label>
								<input type="text" name="service_engineer_no" class="form-control phone"
								value="{{ old('service_engineer_no') }}" />
							</div>
							<div class="form-group col-md-6">
								<label> @lang('equicare.critical') </label><br/>
								<label>
								<input type="radio" value="1" name="is_critical" @if(old('is_critical') == '1') checked @endif>
								@lang('equicare.yes')	</label> &nbsp;
								<label>
								<input type="radio" value="0" name="is_critical" @if(old('is_critical') == '0') checked @endif @if(!old('is_critical')) checked @endif>
								@lang('equicare.no')
								</label>
							</div>
							<table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th> FUNCTIONS</th>
                    <th>ALARMS</th>
                    <th> SAFETY</th>
                    <th>QA/QC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Status</th>
                    <td>
                        <select name="stage1_test1_status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="passed">Passed</option>
                            <option value="failed">Failed</option>
                        </select>
                    </td>
                    <td>
						
                        <select name="stage2_test1_status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="passed">Passed</option>
                            <option value="failed">Failed</option>
                        </select>
                    </td>
                    <td>
                        <select name="stage3_test1_status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="passed">Passed</option>
                            <option value="failed">Failed</option>
                        </select>
                    </td>
                    <td>
                        <select name="stage4_test1_status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="passed">Passed</option>
                            <option value="failed">Failed</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
                        <textarea name="stage1_test2_description" class="form-control"></textarea>
                    </td>
                    <td>
                        <textarea name="stage2_test2_description" class="form-control"></textarea>
                    </td>
                    <td>
                        <textarea name="stage3_test2_description" class="form-control"></textarea>
                    </td>
                    <td>
                        <textarea name="stage4_test2_description" class="form-control"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>			
									<div class="form-group col-md-4">
								{!! Form::label('CATALOGUE',__('equicare.CATALOGUE')) !!}
								<input type="file" class="form-control" name="CATALOGUE" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
								{{-- {!! Form::file('CATALOGUE',null,['class' => 'form-control']) !!} --}}
							</div>
							<div class="form-group col-md-4">
								{!! Form::label('next_maintenance_date',__('equicare.next_maintenance_date')) !!}
								{!! Form::text('next_maintenance_date',null,['class' => 'due_date form-control']) !!}
							</div>
							<div class="form-group col-md-4">
								<label for="notes"> @lang('equicare.notes') </label>
								<textarea rows="1" name="notes" class="form-control"
								>{{ old('notes') }}</textarea>
							</div>


							<div  class="form-group col-md-3 equipment_stops_date_time_container">
									
								<label for="spare-part-quantity">@lang('equicare.SPARE_NO')  </label>
								{{-- <input type="text" class="form-control" placeholder="Input 1" name="SPARE_NO"  > --}}
	
								{!! Form::text('numper_pi[]', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!}
							  </div>
							  <div  class="form-group col-md-3 equipment_stops_date_time_container">
									
								<label for="spare-part-quantity">@lang('equicare.Spare Part Name')  </label>
								{{-- <input type="text" class="form-control" placeholder="Input 1" name="SPARE_NO"  > --}}
	
								{!! Form::text('name_p[]', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!}
							  </div>
							  <div  class="form-group col-md-3 equipment_stops_date_time_container">
									
								<label for="spare-part-quantity">@lang('equicare.code_pi')  </label>
								{{-- <input type="text" class="form-control" placeholder="Input 1" name="SPARE_NO"  > --}}
	
								{!! Form::text('code_pi[]', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!}
							  </div>
							  <div  class="form-group col-md-3 equipment_stops_date_time_container">
									
								<label for="spare-part-quantity">@lang('equicare.Quantity')  </label>
								{{-- <input type="text" class="form-control" placeholder="Input 1" name="SPARE_NO"  > --}}
	
								{!! Form::text('quantity_pi[]', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!}
							  </div>
							  <div  class="form-group col-md-3 equipment_stops_date_time_container">
									
								<label for="spare-part-quantity">@lang('equicare.Type_SPARE')  </label>
								{{-- <input type="text" class="form-control" placeholder="Input 1" name="SPARE_NO"  > --}}
	
								{!! Form::text('type_pi[]', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!}
							  </div>

							</div>


							<div class="form-group">
								<div id="inputContainer">
								</div></div>
					
							<div class="row">
								{{-- <div  class="form-group col-md-4 equipment_stops_date_time_container">
									
									{{-- <label for="spare-part-quantity">@lang('equicare.SPARE_NO')  </label> --}}
									{{-- <input type="text" class="form-control" placeholder="Input 1" name="SPARE_NO"  > --}}
		
									{{-- {{-- {!! Form::text('SPARE_NO[]', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!} --}}
								  </div>
						
							  <div class="form-group col-md-4 equipment_stops_date_time_container">
								{{-- <label for="spare-part-name">  @lang('equicare.Spare Part Name') </label> --}}
								{{-- <input type="text" class="form-control" placeholder="Input 2" name="spare_name "  > --}}
		
								{{-- {!! Form::text('spare_name[]', null, ['class' => 'form-control', 'id' => 'spare-part-name']) !!} --}}
							  {{-- </div> --}}
							  {{-- <div class="form-group col-md-4 equipment_stops_date_time_container"> --}}
								{{-- <label for="spare-part-quantity">@lang('equicare.Quantity')  </label> --}}
								{{-- <input type="text" class="form-control" placeholder="Input 3" name="quantity"  > --}}
		
								{{-- {!! Form::text('quantity[]', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!} --}}
							  {{-- </div> --}}
							  {{-- <div class="form-group col-md-4 equipment_stops_date_time_container"> --}}
								{{-- <label for="spare-part-type">@lang('equicare.Type_SPARE') </label> --}}
								{{-- {!! Form::text('type_sp[]', null, ['class' => 'form-control', 'id' => 'spare-part-type']) !!} --}}
								{{-- <input type="text" class="form-control" placeholder="Input 4" name="type_sp"  > --}}
								
		
							  {{-- </div> --}} 

							  <div class="col-md-12" id="fa-fa-plus-id">
								<button type="button" class="pull-right btn btn-primary " id="addInputButton" ><i
										class="fa fa-plus" id="add-button"></i> @lang('equicare.add_more_equipments')</button>
							</div>
							
							


								<div  class="form-group col-md-4 equipment_stops_date_time_container">
									<label for="spare-part-quantity">@lang('equicare.code_ac')  </label>
									{{-- <input type="text" class="form-control" placeholder="Input 1" name="SPARE_NO"  > --}}
		
									{!! Form::text('code_ac[]', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!}
								  </div>
						
							  <div class="form-group col-md-4 equipment_stops_date_time_container">
								<label for="spare-part-name">  @lang('equicare.name_acce') </label>
								{{-- <input type="text" class="form-control" placeholder="Input 2" name="spare_name "  > --}}
		
								{!! Form::text('name_acce[]', null, ['class' => 'form-control', 'id' => 'spare-part-name']) !!}
							  </div>
							  <div class="form-group col-md-4 equipment_stops_date_time_container">
								<label for="spare-part-quantity">@lang('equicare.quantity_ac')  </label>
								{{-- <input type="text" class="form-control" placeholder="Input 3" name="quantity"  > --}}
		
								{!! Form::text('quantity_ac[]', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!}
							  </div>
							  <div class="form-group col-md-4 equipment_stops_date_time_container">
								<label for="spare-part-type">@lang('equicare.piece_number') </label>
								{!! Form::text('piece_number[]', null, ['class' => 'form-control', 'id' => 'spare-part-type']) !!}
								{{-- <input type="text" class="form-control" placeholder="Input 4" name="type_sp"  > --}}
		
								<div class="col-md-12" id="fa-fa-plus-id">

							 							<div id="inputContainerac"></div>
								</div>

							  <div class="col-md-12" id="fa-fa-plus-id">
								<button type="button" class="pull-right btn btn-primary "    id="addInputaccButton"><i
										class="fa fa-plus"></i> @lang('equicare.add_more_equipments')</button>
							</div>
						</div>

							<input type="hidden" name="qr_id" value="{{request('qr_id')}}"/>
							<div class="form-group col-md-12">
								<input type="submit" value="@lang('equicare.submit')" class="btn btn-primary btn-flat"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>     
	</div>
				</div>
			</div>
		</div>
	@endsection
	@section('scripts')
<script src="{{ asset('assets/js/datetimepicker.js') }}" type="text/javascript"></script>
<script type="text/javascript">
  let inputCount = 1;
    let inputCountac = 1;

    function addInputFields() {
      const container = document.getElementById("inputContainer");

      const inputGroup = document.createElement("div");
      inputGroup.classList.add("input-group");

      const input1 = document.createElement("input");
      input1.type = "text";
      input1.placeholder = "@lang('equicare.numper_pi')";
      input1.name = `numper_pi[]`;
      input1.id = `input${inputCount}_1`;

      const input2 = document.createElement("input");
      input2.type = "text";
      input2.placeholder = "  @lang('equicare.Spare Part Name')";
      input2.name = `name_p[]`;
      input2.id = `input${inputCount}_2`;

      const input3 = document.createElement("input");
      input3.type = "text";
      input3.placeholder = "@lang('equicare.Quantity')";
      input3.name = `quantity_pi[]`;
      input3.id = `input${inputCount}_3`;

      const input4 = document.createElement("input");
      input4.type = "text";
      input4.placeholder = "@lang('equicare.code_pi') ";
      input4.name = `code_pi[]`;
      input4.id = `input${inputCount}_4`;

      const input5 = document.createElement("input");
      input5.type = "text";
      input5.placeholder = "@lang('equicare.Type_SPARE') ";
      input5.name = `type_pi[]`;
      input5.id = `input${inputCount}_5`;

      const removeButton = document.createElement("button");
      removeButton.textContent = "Delete";
      removeButton.onclick = function() {
        container.removeChild(this.parentNode);
      };

      inputGroup.appendChild(input1);
      inputGroup.appendChild(input2);
      inputGroup.appendChild(input3);
      inputGroup.appendChild(input4);
      inputGroup.appendChild(removeButton);

      container.appendChild(inputGroup);
      inputCount++;
    }

    function addInputaccFields() {
      const containerac = document.getElementById("inputContainerac");

      const inputGroup = document.createElement("div");
      inputGroup.classList.add("input-group");

      const input1 = document.createElement("input");
      input1.type = "text";
      input1.placeholder = "@lang('equicare.SPARE_NO')";
      input1.name = `code_ac[]`;
      input1.id = `inputa${inputCountac}_1`;

      const input2 = document.createElement("input");
      input2.type = "text";
      input2.placeholder = "Input 2";
      input2.name = `name_acce[]`;
      input2.id = `inputa${inputCountac}_2`;

      const input3 = document.createElement("input");
      input3.type = "text";
      input3.placeholder = "@lang('equicare.SPARE_NO')";
      input3.name = `piece_number[]`;
      input3.id = `inputa${inputCountac}_3`;

      const input4 = document.createElement("input");
      input4.type = "text";
      input4.placeholder = "Input 4";
      input4.name = `quantity_ac[]`;
      input4.id = `inputa${inputCountac}_4`;

      const removeButton = document.createElement("button");
      removeButton.textContent = "Delete";
      removeButton.onclick = function() {
        containerac.removeChild(this.parentNode);
      };

      inputGroup.appendChild(input1);
      inputGroup.appendChild(input2);
      inputGroup.appendChild(input3);
      inputGroup.appendChild(input4);
      inputGroup.appendChild(removeButton);

      containerac.appendChild(inputGroup);
      inputCountac++;
    }

    const addInputButton = document.getElementById("addInputButton");
    addInputButton.onclick = addInputFields;

    const addInputaccButton = document.getElementById("addInputaccButton");
    addInputaccButton.onclick = addInputaccFields;

// let inputCount = 1;

// function addInputFields() {
//   const container = document.getElementById("inputContainer");
// //   container.classList=' form-group col-md-4'

//   const newInput1 = document.createElement("input");
//   newInput1.type = "text";
//   newInput1.placeholder = "@lang('equicare.SPARE_NO')";
//   newInput1.name = `SPARE_NO[]`;
//   newInput1.id = `input${inputCount}_1`;
// //   newInput1.classList='form-control'

//   const newInput2 = document.createElement("input");
//   newInput2.type = "text";
//   newInput2.placeholder = "Input 2";
//   newInput2.name = `spare_name[]`;
//   newInput2.id = `input${inputCount}_2`;
// //   newInput2.classList='form-control'

//   const newInput3 = document.createElement("input");
//   newInput3.type = "text";
//   newInput3.placeholder = "@lang('equicare.SPARE_NO')";
//   newInput3.name = `quantity[]`;
//   newInput3.id = `input${inputCount}_3`;
// //   newInput3.classList='form-control'

//   const newInput4 = document.createElement("input");
//   newInput4.type = "text";
//   newInput4.placeholder = "Input 4";
//   newInput4.name = `input${inputCount}_4`;
//   newInput4.id = `input${inputCount}_4`;
// //   newInput4.classList='form-control'

//   const removeButton = document.createElement("button");
//   removeButton.textContent = "Delete";
//   removeButton.onclick = function() {
//     container.removeChild(this.parentNode);
//   };

//   const newDiv = document.createElement("div");

//   // Add a class to the new div
// //   newDiv.classList='form-group  col-md-4';
//   newDiv.appendChild(newInput1);
//   newDiv.appendChild(newInput2);
//   newDiv.appendChild(newInput3);
//   newDiv.appendChild(newInput4);
//   newDiv.appendChild(removeButton);

//   container.appendChild(newDiv);
// }


// let inputCountac = 1;






// function addInputaccFields() {
//   const containerac = document.getElementById("inputContainer");
// //   container.classList=' form-group col-md-4'

//   const newInputa1 = document.createElement("input");
//   newInputa1.type = "text";
//   newInputa1.placeholder = "@lang('equicare.SPARE_NO')";
//   newInputa1.name = `code_ac[]`;
//   newInputa1.id = `inputa${inputCountac}_1`;
// //   newInput1.classList='form-control'

//   const newInputa2 = document.createElement("input");
//   newInputa2.type = "text";
//   newInputa2.placeholder = "Input 2";
//   newInputa2.name = `name_acce[]`;
//   newInputa2.id = `inputa${inputCountac}_2`;
// //   newInput2.classList='form-control'

//   const newInputa3 = document.createElement("input");
//   newInputa3.type = "text";
//   newInputa3.placeholder = "@lang('equicare.SPARE_NO')";
//   newInputa3.name = `piece_number[]`;
//   newInputa3.id = `inputa${inputCountac}_3`;
// //   newInput3.classList='form-control'

//   const newInputa4 = document.createElement("input");
//   newInputa4.type = "text";
//   newInputa4.placeholder = "Input 4";
//   newInpuat4.name = `quantity_ac[]`;
//   newInpuat4.id = `inputa${inputCountac}_4`;
// //   newInput4.classList='form-control'

//   const removeButtonac = document.createElement("button");
//   removeButtonac.textContent = "Delete";
//   removeButtonac.onclick = function() {
//     containerac.removeChild(this.parentNode);
//   };

//   const newDivac = document.createElement("div");

//   // Add a class to the new div
// //   newDiv.classList='form-group  col-md-4';
// newDivac.appendChild(newInputa1);
// newDivac.appendChild(newInputa2);
// newDivac.appendChild(newInputa3);
// newDivac.appendChild(newInputa4);
// newDivac.appendChild(removeButtonac);

//   containerac.appendChild(newDivac);
// }


//   const newDiv = document.createElement("div");
//   newDiv.classList.add("form-group col-md-4 ");
//   newDiv.appendChild(newInput1);
//   newDiv.appendChild(newInput2);
//   newDiv.appendChild(newInput3);
//   newDiv.appendChild(newInput4);
//   newDiv.appendChild(removeButton);

//   container.appendChild(newDiv);

//   inputCount++;
// }
// Assuming you have a jQuery library available
$(document).ready(function() {
    $('#assess_equipment').change(function() {
        var selectedValue = $(this).val();
        var equipmentStopsDateTimeContainer = $('.equipment_stops_date_time_container');
        var reasonsStoppingContainer = $('.reasons_stopping_container');

        if (selectedValue === 'Discontinued service') {
            equipmentStopsDateTimeContainer.show();
            reasonsStoppingContainer.show();
        } else {
            equipmentStopsDateTimeContainer.hide();
            reasonsStoppingContainer.hide();
        }
    });
});

// $(document).ready(function() {
//     $('#reasons_stopping').change(function() {
//         var selectedValue = $(this).val();
//         var equipmentStopsDateTimeContainer = $('.equipment_stops_date_time_container');
//         var reasonsStoppingContainer = $('.reasons_stopping_container');

//         if (selectedValue === 'Malfunction requires spare parts') {
//             equipmentStopsDateTimeContainer.show();
//             // reasonsStoppingContainer.show();
//         } else {
//             equipmentStopsDateTimeContainer.hide();
//             reasonsStoppingContainer.hide();
//         }
//     });
// });

// JavaScript
document.getElementById('reasons_stopping').addEventListener('change', (event) => {
  if (event.target.value === 'Malfunction requires spare parts') {
    // Show the modal
    $('#spare-part-modal').modal('show');
  }
});

// Add a click event listener to the "Save" button in the modal
document.getElementById('save-spare-part').addEventListener('click', () => {
  // Retrieve the values from the input fields
  const sparePartName = document.getElementById('spare-part-name').value;
  const sparePartQuantity = document.getElementById('spare-part-quantity').value;
  const sparePartType = document.getElementById('spare-part-type').value;

  // Perform any necessary actions with the collected data
  console.log('Spare Part Name:', sparePartName);
  console.log('Spare Part Quantity:', sparePartQuantity);
  console.log('Spare Part Type:', sparePartType);

  // Close the modal
  $('#spare-part-modal').modal('hide');
});



</script>
<script type="text/javascript">
	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}">

@endsection
	{{-- @section('scripts')
	<script src="{{ asset('assets/js/datetimepicker.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
	// $(document).ready(function() {
//     $('#Donor').change(function() {
//         var selectedValue = $(this).val();
//         var equipmentStopsDateTimeContainer = $('.namee_donors');
//         var reasonsStoppingContainer = $('.phone_donors');

//         if (selectedValue === 'Organizations and donors') {
//             equipmentStopsDateTimeContainer.show();
//             reasonsStoppingContainer.show();
//         } else {
//             equipmentStopsDateTimeContainer.hide();
//             reasonsStoppingContainer.hide();
//         }
//     });
// });
let inputCount = 1;

function addInputFields() {
  const container = document.getElementById("inputContainer");
  container.classList=' form-group col-md-4'

  const newInput1 = document.createElement("input");
  newInput1.type = "text";
  newInput1.placeholder = "@lang('equicare.SPARE_NO')";
  newInput1.name = `SPARE_NO[]`;
  newInput1.id = `input${inputCount}_1`;
  newInput1.classList='form-control'

  const newInput2 = document.createElement("input");
  newInput2.type = "text";
  newInput2.placeholder = "Input 2";
  newInput2.name = `spare_name[]`;
  newInput2.id = `input${inputCount}_2`;
  newInput2.classList='form-control'

  const newInput3 = document.createElement("input");
  newInput3.type = "text";
  newInput3.placeholder = "@lang('equicare.SPARE_NO')";
  newInput3.name = `quantity[]`;
  newInput3.id = `input${inputCount}_3`;
  newInput3.classList='form-control'

  const newInput4 = document.createElement("input");
  newInput4.type = "text";
  newInput4.placeholder = "Input 4";
  newInput4.name = `input${inputCount}_4`;
  newInput4.id = `input${inputCount}_4`;
  newInput4.classList='form-control'

  const removeButton = document.createElement("button");
  removeButton.textContent = "Delete";
  removeButton.onclick = function() {
    container.removeChild(this.parentNode);
  };

  const newDiv = document.createElement("div");

  // Add a class to the new div
  newDiv.classList='form-group  col-md-4';
  newDiv.appendChild(newInput1);
  newDiv.appendChild(newInput2);
  newDiv.appendChild(newInput3);
  newDiv.appendChild(newInput4);
  newDiv.appendChild(removeButton);

  container.appendChild(newDiv);
}

$(document).ready(function() {
    $('#Donor').change(function() {
        var selectedValue = $(this).val();
        var nameDonatorsField = $('.namee_donors');
        var phoneDonatorsField = $('.phone_donors');

        // if (selectedValue === 'Governmental') {
         
        if (selectedValue === 'Organizations and donors') {
            nameDonatorsField.show();
            phoneDonatorsField.show();
        }
		else {
			nameDonatorsField.hide();
            phoneDonatorsField.hide();


		}
    });
});

			$(document).ready(function(){
				$('#date_of_purchase').datepicker({
					format:"{{env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')}}",
					'todayHighlight' : true,
				});
				$('#order_date').datepicker({
					format:"{{env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')}}",
					'todayHighlight' : true,
				});
				$('#date_of_installation').datepicker({
					format:"{{env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')}}",
					'todayHighlight' : true,
				});
				$('#warranty_due_date').datepicker({
					format:"{{env('date_settings')=='' ? 'yyyy-mm-dd' : env('date_settings')}}",
					'todayHighlight' : true,
				});
			});
		</script>
	@endsection --}}