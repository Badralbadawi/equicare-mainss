@extends('layouts.admin')
@section('body-title')
	@lang('equicare.admin/test_and_calibrations')
@endsection
@section('title')
	| @lang('equicare.admin/test_and_calibrations')
@endsection
@section('breadcrumb')
<li><a href="{{ url('admin/admin/test_and_calibrations') }}">@lang('equicare.admin/test_and_calibrations')</a></li>
<li class="active">@lang('equicare.edit')</li>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title">@lang('equicare.edit_test_and_calibration')</h4>
				</div>
				<div class="box-body ">
					@include ('errors.list')
					<form class="form" method="post" action="{{ route('admin/test_and_calibrations.update',$test_and_calibration->id) }}">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PATCH"/>
						<div class="row">
						<div class="form-group col-md-6">
							<label for="name"> @lang('equicare.name') </label>
							<input type="text" name="name" class="form-control"
							value="{{ $test_and_calibration->name }}" />
						</div>
						<input type="hidden" name="id" class="form-control"
							value="{{ $test_and_calibration->id }}" />
						<div class="form-group col-md-6">
							<label for="slug"> @lang('equicare.Short Name') </label>
							<input type="text" name="slug" class="form-control"
							value="{{ $test_and_calibration->slug }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="email"> @lang('equicare.email') </label>
							<input type="email" name="email" class="form-control" value="{{ $test_and_calibration->email }}"/>
						</div>
						<div class="form-group col-md-6">
							<label for="governorate"> @lang('equicare.Governorate') </label>
							<input type="text" name="governorate" class="form-control"
							value="{{ $test_and_calibration->governorate }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="directorate"> @lang('equicare.Directorate') </label>
							<input type="text" name="directorate" class="form-control"
							value="{{ $test_and_calibration->directorate }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="type_of_healthfcility"> @lang('equicare.type_of_healthfcility') </label>
							<input type="text" name="type_of_healthfcility" class="form-control"
							value="{{ $test_and_calibration->type_of_healthfcility }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="contact_person"> @lang('equicare.contact_person') </label>
							<input type="text" name="contact_person" class="form-control"
							value="{{ $test_and_calibration->contact_person }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="phone_no"> @lang('equicare.phone') </label>
							<input type="text" name="phone_no" class="form-control phone"
							value="{{ $test_and_calibration->phone_no }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="mobile_no"> @lang('equicare.mobile') </label>
							<input type="text" name="mobile_no" class="form-control phone"
							value="{{ $test_and_calibration->mobile_no }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="address"> @lang('equicare.address') </label>
							<textarea rows="3" name="address" class="form-control"
							>{{ $test_and_calibration->address }}</textarea>
						</div>
						<br/>
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