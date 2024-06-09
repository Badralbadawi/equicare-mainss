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
						{!! Form::select('governorate',$governorate??[],null,['class'=>'form-control','placeholder'=>'--select--']) !!}
					</div>
					<div class="form-group col-md-4">
						<label for="directorate"> @lang('equicare.directorate') </label>
						{!! Form::select('directorate',$directorate??[],null,['class'=>'form-control','placeholder'=>'--select--']) !!}
					</div>
					<div class="form-group col-md-4">
						<label for="type_of_healthfcility"> @lang('equicare.type_of_healthfcility') </label>
						{!! Form::select('type_of_healthfacility',$type_of_healthfacilitys??[],null,['class'=>'form-control','placeholder'=>'--select--']) !!}
					</div>


					{{-- <div class="form-group col-md-4">
						<label for="department"> @lang('equicare.Governorate') </label>

						{!! Form::select('Governorate',($Governorate->name)??[],null,['class'=>'form-control
						hospital_select2','placeholder'=>'Select']) !!}
					</div> --}}
					{{-- <div class="form-group col-md-4">
						<label for="department"> @lang('equicare.Directorates') </label>

						{!! Form::select('hospital',($hospitals)??[],null,['class'=>'form-control
						hospital_select2','placeholder'=>'Select']) !!}
					</div> --}}
					
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

					<div class="form-group col-md-4">
						<label for="provenance"> @lang('equicare.provenance') </label>
						<input type="text" name="provenance" class="provenance form-control" value="" disabled />
					</div>



				</div>
			</div>
			<div class="box-body">
				<form class="form" method="post" action="{{ route('evaluation_scans.store') }}">
					{{ csrf_field() }}
					{{ method_field('POST') }}
					{{-- <div class="row">
						<div class="form-group col-md-4">
							<label>@lang('equicare.call_handle'):</label>
							<div class="radio iradio">
								<label class="login-padding">
									{!! Form::radio('call_handle', 'internal')!!} @lang('equicare.internal')
								</label>
								<label>
									{!! Form::radio('call_handle', 'external',null,['id'=>'external'])!!} @lang('equicare.external')
								</label>
							</div>
						</div>
						<div class="form-group col-md-4 report_no none-display">
							<label for="department"> @lang('equicare.report_number') </label>
							<input type="text" name="report_no" class="form-control" value="" />
						</div>
					</div>  --}}
					<div class="row">
						{{-- <div class="form-group col-md-4">
							<label for="reasons_stopping"> @lang('equicare.assess equipment') </label>
							<div class="input-group">

							<input type="textarea" name="assess_equipment" class="form-control" value="" />
							<span class="input-group-addon">
								<i class="fa fa-clock-o"></i>
							</span> --}}
						{{-- </div> --}}
						{{-- </div> --}}
						{{-- <div class="form-group col-md-4">
							<label>@lang('equicare.assess equipment')</label>
							{!! Form::select('assess_equipment',[
							'excellent' => __("equicare.excellent"),
							'very good' => __("equicare.very good"),
							'good' => __("equicare.good"),
							'unacceptable' => __("equicare.unacceptable"),

							'Discontinued service' => __("equicare.Discontinued service")

							
							],null,['placeholder' => '--select--','class' => 'form-control']) !!}
						</div> --}}
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



						{{-- <div class="form-group col-md-4">
							<label for="department"> @lang('equicare.equipment_stops_date_time') </label>
							<div class="input-group">
								<input type="text" name="equipment_stops_date_time" class="form-control call_register_date_time"
									value="" />
								<span class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</span>
							</div> --}}
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
							
							{{-- <div class="form-group col-md-4 reasons_stopping_container">
								<label>@lang('equicare.reasons stopping')</label>
								{!! Form::textarea('reasons_stopping', null, ['rows' => 2, 'class' => 'form-control']) !!}
							</div> --}}
							<div class="form-group col-md-4">
								<label>@lang('equicare.reasons stopping')</label>
								{!! Form::select('reasons_stopping', [
									'No repair' => __("equicare.No repair"),
									'Malfunction requires spare parts' => __("equicare.Malfunction requires spare parts"),
									'Lack of staff' => __("equicare.Lack of staff"),
									'No consumables' => __("equicare.No consumables"),
									'Not installed or operated' => __("equicare.Not installed or operated"),
									'Consists' => __("equicare.Consists"),

								], null, ['placeholder' => '--select--', 'class' => 'form-control', 'id' => 'reasons_stopping']) !!}
							</div>

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
						<div class="form-group col-md-4">
							<label>@lang('equicare.working_statu')</label>
							{!! Form::select('working_status',[
							'working' => __("equicare.working"),
							'not working' => __("equicare.not_working"),
							'pending' => __("equicare.pending")
							],null,['placeholder' => '--select--','class' => 'form-control']) !!}
						</div>
						<div class="form-group col-md-4">
							<label>@lang('equicare.remark')</label>
							{!! Form::textarea('remarks',null,['rows' => 2, 'class' => 'form-control']) !!}
						</div>

						{{-- <div class="form-group col-md-4">
							<label>@lang('equicare.reasons stopping')</label>
							{!! Form::textarea('reasons_stopping',null,['rows' => 2, 'class' => 'form-control']) !!}
						</div> --}}
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
			</div>
			</form>
			{{-- <div class="form-group col-md-4 ">
				<label>@lang('equicare.reasons stopping')</label>
				{!! Form::text('name', null, ['rows' => 2, 'class' => 'form-control']) !!}
			</div> 

			<div class="form-group col-md-4 ">
				<label>@lang('equicare.reasons stopping')</label>
				{!! Form::text('quantity', null, ['rows' => 2, 'class' => 'form-control']) !!}
			</div>

			<div class="form-group col-md-4 ">
				<label>@lang('equicare.reasons stopping')</label>
				{!! Form::text('type_sp', null, ['rows' => 2, 'class' => 'form-control']) !!}
			</div>
 --}}
<!-- HTML -->
<form class="form" method="post" action="{{ route('sparte_parts_scan') }}">
	{{ csrf_field() }}
	{{ method_field('POST') }}

<div class="modal fade" id="spare-part-modal" tabindex="-1" role="dialog" aria-labelledby="spare-part-modal-label" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="spare-part-modal-label"> @lang('equicare.Spare Part Details<')<z/h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label for="spare-part-quantity">@lang('equicare.SPARE_NO')  </label>
				{!! Form::text('SPARE_NO', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!}
			  </div>
	
		  <div class="form-group">
			<label for="spare-part-name">  @lang('equicare.Spare Part Name') </label>
			{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'spare-part-name']) !!}
		  </div>
		  <div class="form-group">
			<label for="spare-part-quantity">@lang('equicare.Quantity')  </label>
			{!! Form::text('quantity', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!}
		  </div>
		  <div class="form-group">
			<label for="spare-part-type">@lang('equicare.Type_SPARE') </label>
			{!! Form::text('type_sp', null, ['class' => 'form-control', 'id' => 'spare-part-type']) !!}
		  </div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <input type="submit" value="@lang('equicare.submit')"  class="btn btn-primary" id="save-spare-part">
		</div>
	  </div>
	</div>
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
			//		Donor.val("");
			//		name_donors.val("");
		//			phone_donors.val("");
		//			provenance.val("");

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
</script>
<script type="text/javascript">
	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}">

@endsection