@extends('layouts.admin')
@section('body-title')
@lang('equicare.Evaluation_scan')
@endsection
@section('title')
| @lang('equicare.Evaluation_scan')
@endsection
@section('breadcrumb')
<li>
	<a href="{{ url('/admin/evaluation_scans') }}">
		@lang('equicare.preventive_maintenance')
	</a>
</li>
<li class="active">@lang('equicare.create')</li>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title">@lang('equicare.create_Evaluation_scan')</h4>
			</div>
			<div class="box-body ">
				@include ('errors.list')
				<div class="row">
										
					<div class="form-group col-md-4">
						<label for="governorate"> @lang('equicare.Governorate') </label>
						<input type="text" name="governorate" class=" governorate form-control" value="" disabled />
					</div>

				
				<div class="form-group col-md-4">
					<label for="governorate"> @lang('equicare.directorate') </label>
					<input type="text" name="directorate" class=" directorate form-control" value="" disabled />
				</div>
			
			<div class="form-group col-md-4">
				<label for="governorate"> @lang('equicare.type_of_healthfacility') </label>
				<input type="text" name="type_of_healthfacilityS" class=" type_of_healthfacilityS form-control" value="" disabled />
			</div>


 					
					<div class="form-group col-md-4">
						<label for="department"> @lang('equicare.hospital') </label>

						{!! Form::select('hospital',($hospitals)??[],null,['class'=>'form-control
						hospital_select2','placeholder'=>'Select']) !!}
					</div>
					<div class="form-group col-md-4">
						<label for="department"> @lang('equicare.department') </label>

						{!! Form::select('department',array_unique($departments)??[],null,['class'=>'form-control
						department_select2','placeholder'=>'Select']) !!}
					</div>
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


					{{-- <div class="form-group col-md-4">
						<label for="department"> @lang('equicare.Donor') </label>

						{!! Form::select('hospital',($hospitals)??[],null,['class'=>'form-control
						hospital_select2','placeholder'=>'Select']) !!}
					</div> --}}

					<div class="form-group col-md-4">
						<label for="production_date"> @lang('equicare.production date') </label>
						<input type="text" name="production_date" class=" production_date form-control" value="" disabled />
					</div>

					<div class="form-group col-md-4">
						<label for="Donor"> @lang('equicare.Donor') </label>
						<input type="text" name="Donor" class="Donor  form-control" value="" disabled />
					</div>
					<div class="form-group col-md-4">
						<label for="name_donors"> @lang('equicare.name donors') </label>
						<input type="text" name="name_donors" class=" name_donors form-control" value="" disabled />
					</div>


					<div class="form-group col-md-4">
						<label for="phone_donors"> @lang('equicare.phone donors') </label>
						<input type="text" name="phone_donors" id="phone_donors" class="phone_donors form-control" value="" disabled />
					</div>

					<div class="form-group col-md-4 ">
						<label for="provenance"> @lang('equicare.provenance') </label>
						<input type="text" name="provenance" class="provenance form-control" value="" disabled />
					</div>



				</div>
			</div>
			<div class="box-body">
				<form class="form" method="post" action="{{ route('evaluation_scans.store') }}">
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
							<label>@lang('equicare.assess equipment')</label>
							{!! Form::select('assess_equipment', [
								'excellent' => __("equicare.excellent"),
								'very good' => __("equicare.very good"),
								'good' => __("equicare.good"),
								'unacceptable' => __("equicare.unacceptable"),
								'Discontinued service' => __("equicare.Discontinued service"),
							], null, ['placeholder' => '--select--', 'class' => 'form-control', 'id' => 'assess_equipment']) !!}
						</div>



							<div class="form-group col-md-4 equipment_stops_date_time_container">
								<label for="department"> @lang('equicare.equipment_stops_date_time') </label>
								<div class="input-group">
									<input type="text" name="equipment_stops_date_time" class="form-control call_register_date_time"
										value="" />
									<span class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</span>
								</div>
							</div>
							
							<div class="form-group col-md-4 ">
								<label>@lang('equicare.reasons stopping')</label>
								{!! Form::select('reasons_stopping', [
									'No repair' => __("equicare.No repair"),
									'Malfunction requires spare parts' => __("equicare.Malfunction requires spare parts"),
									'Lack of staff' => __("equicare.Lack of staff"),
									'No consumables' => __("equicare.No consumables"),
									'Not installed or operated' => __("equicare.Not installed or operated"),
									'Consists' => __("equicare.Consists"),

								], null, ['placeholder' => '--select--', 'class' => 'form-control', 'id' => 'reasons_stopping']) !!}
d							</div>

						</div>
						<div class="form-group col-md-4">
							<label for="evaluation_scan_date_time"> @lang('equicare.evaluation_scan_date_time') </label>
							<div class="input-group">
								<input type="text" name="evaluation_scan_date_time" class="form-control " value="" />
								<span class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</span>
							</div>
	
						</div>
						<div class="form-group col-md-4 equipment_stops_date_time_container">
							<label>@lang('equicare.working_statu')</label>
							{!! Form::select('working_status',[
							'working' => __("equicare.working"),
							'not working' => __("equicare.not_working"),
							'pending' => __("equicare.pending")
							],null,['placeholder' => '--select--','class' => 'form-control']) !!}
						</div>
						<div class="form-group col-md-4 equipment_stops_date_time_container">
							<label>@lang('equicare.remark')</label>
							{!! Form::textarea('remarks',null,['rows' => 2, 'class' => 'form-control']) !!}
						</div>
						<div id="inputContainer">
						<div  class="form-group col-md-4 equipment_stops_date_time_container">
							<label for="spare-part-quantity">@lang('equicare.SPARE_NO')  </label>
							{{-- <input type="text" class="form-control" placeholder="Input 1" name="SPARE_NO"  > --}}

							{!! Form::text('SPARE_NO[]', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!}
						  </div>
				
					  <div class="form-group col-md-4 equipment_stops_date_time_container">
						<label for="spare-part-name">  @lang('equicare.Spare Part Name') </label>
						{{-- <input type="text" class="form-control" placeholder="Input 2" name="spare_name "  > --}}

						{!! Form::text('spare_name[]', null, ['class' => 'form-control', 'id' => 'spare-part-name']) !!}
					  </div>
					  <div class="form-group col-md-4 equipment_stops_date_time_container">
						<label for="spare-part-quantity">@lang('equicare.Quantity')  </label>
						{{-- <input type="text" class="form-control" placeholder="Input 3" name="quantity"  > --}}

						{!! Form::text('quantity[]', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!}
					  </div>
					  <div class="form-group col-md-4 equipment_stops_date_time_container">
						<label for="spare-part-type">@lang('equicare.Type_SPARE') </label>
						{!! Form::text('type_sp[]', null, ['class' => 'form-control', 'id' => 'spare-part-type']) !!}
						{{-- <input type="text" class="form-control" placeholder="Input 4" name="type_sp"  > --}}


					  </div>
					  <div class="col-md-12" id="fa-fa-plus-id">
						<button type="button" class="pull-right btn btn-primary " onclick="addInputFields()"><i
								class="fa fa-plus" id="add-button"></i> @lang('equicare.add_more_equipments')</button>
						<button type="button"onclick="delteInputFields()"
							class="pull-right btn btn-danger btn-sm "><i
								class="fa fa-close"></i> @lang('equicare.delete_line')</button>
					</div>

						</div>
						{{-- <input type="submit" value="@lang('equicare.submit')" class="btn btn-primary btn-flat " onclick="addInputFields()"> --}}
	
					</div>
					{{-- <div class="modal-footer">
					  <button type="button" class="bttn-secondary" n bdata-dismiss="modal">Close</button>
					  <input type="submit" value="@lang('equicare.submit')"  class="btn btn-primary" id="save-spare-part">
					</div> --}}
				  </div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="checkbox icheck">
							<label>
								<input type="checkbox" name="is_contamination" value="1" class="minimal">&nbsp;
								@lang('equicare.is_contamination')</label>
						</div>
					</div>
					<div class="form-group col-md-12"> 
						 {{-- <input type="hidden" name="equip_id" id="equip_id" value="" /> --}}
						<input type="hidden" name="equip_id" id="equip_id" value="{{old('equip_id')}}" />
						<input type="hidden" name="hospital_id" id="hospital_id" value="{{old('hospital_id')}}" />
						<input type="hidden" name="department_id" id="department_id" value="{{old('department_id')}}" />
						<input type="submit" value="@lang('equicare.submit')" class="btn btn-primary btn-flat">
					</div>
				</div>

				{{-- <div id="inputContainer">
					<div class="form-group col-md-4">
						<input type="text" class="form-control" placeholder="Input 1" name="SPARE_NO">
	
					</div>
					<div class="form-group col-md-4">
						<input type="text" class="form-control" placeholder="Input 2" name="spare_name">
	
					</div>
	
					<div class="form-group col-md-4">
						<input type="text" class="form-control" placeholder="Input 3" name="quantity">
	
					</div>
	
					<div class="form-group col-md-4">
						<input type="text" class="form-control" placeholder="Input 4" name="type_sp">
	
					</div> --}}
	
	
						{{-- <div class="form-group col-md-4">
							<label>@lang('equicare.reasons stopping')</label>
							{!! Form::textarea('reasons_stopping',null,['rows' => 2, 'class' => 'form-control']) !!}
						</div> --}}
					</div>
			</div>
			</form>

			  </div>
		</div>
	</div>
</div>
</div>


<style>
	.new-input-field {
		display: block;
  width: 100%;
  max-width: 33.33%;
  padding: 5.5rem;
  margin-bottom: 0.5rem;

  box-sizing: border-box;
  align-self: flex-end;

}

.new-input-field input {
  margin-bottom: 0.5rem;
}

.new-input-field button {
  align-self: flex-end;
}
</style>
 

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

let inputCount = 1;

// function addInputFields() {
//   const container = document.getElementById("inputContainer");

//   const newInput1 = document.createElement("input");
//   newInput1.type = "text";
//   newInput1.placeholder = "Input 1";
//   newInput1.name = `SPARE_NO[]`;
//   newInput1.id = `input${inputCount}_1`;


//   const newInput2 = document.createElement("input");
//   newInput2.type = "text";
//   newInput2.placeholder = "Input 2";
//   newInput2.name = `spare_name[]`;
//   newInput2.id = `input${inputCount}_2`;

//   const newInput3 = document.createElement("input");
//   newInput3.type = "text";
//   newInput3.placeholder = "Input 3";
//   newInput3.name = `quantity[]`;
//   newInput3.id = `input${inputCount}_3`;

//   const newInput4 = document.createElement("input");
//   newInput4.type = "text";
//   newInput4.placeholder = "Input 4";
//   newInput4.name = `input${inputCount}_4`;
//   newInput4.id = `input${inputCount}_4`;

//   const removeButton = document.createElement("button");
//   removeButton.textContent = "Delete";
//   removeButton.onclick = function() {
// 	container.removeChild(this.parentNode);
//   };
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