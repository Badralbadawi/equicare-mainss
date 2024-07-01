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
							
							<div class="form-group col-md-6">
								{!! Form::label('CATALOGUE',__('equicare.CATALOGUE')) !!}
								{!! Form::file('CATALOGUE',null,['class' => 'form-control']) !!}
							</div>
		

							<div class="form-group col-md-6">
								<label for="notes"> @lang('equicare.notes') </label>
								<textarea rows="2" name="notes" class="form-control"
								>{{ old('notes') }}</textarea>
							</div>
							<input type="hidden" name="qr_id" value="{{request('qr_id')}}"/>
							<div class="form-group col-md-12">
								<input type="submit" value="@lang('equicare.submit')" class="btn btn-primary btn-flat"/>
							</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	@endsection
	@section('scripts')
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
	@endsection