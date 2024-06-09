@extends('layouts.admin')
@section('body-title')
@lang('equicare.hospitals')
@endsection
@section('title')
	| @lang('equicare.hospitals')
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('admin/hospitals') }}">@lang('equicare.hospitals') </a></li>
<li class="active">@lang('equicare.create')</li>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title">@lang('equicare.create_hospital')</h4>
				</div>

				<div class="box-body ">
					@include ('errors.list')
					<form class="form" method="post" action="{{ route('hospitals.store') }}">
						{{ csrf_field() }}
						{{ method_field('POST') }}
						<div class="row">
						<div class="form-group col-md-6">
							<label for="name"> @lang('equicare.name') </label>
							<input type="text" name="name" class="form-control"
							value="{{ old('name') }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="governorate"> @lang('equicare.Governorate') </label>
							{!! Form::select('governorate',$governorates??[],null,['class'=>'form-control','placeholder'=>'--select--']) !!}
						</div>
						<div class="form-group col-md-6">
							<label for="directorate"> @lang('equicare.directorate') </label>
							{!! Form::select('directorate',$directorates??[],null,['class'=>'form-control','placeholder'=>'--select--']) !!}
						</div>
						<div class="form-group col-md-6">
							<label for="type_of_healthfcility"> @lang('equicare.type_of_healthfcility') </label>
							{!! Form::select('type_of_healthfacilityS',$type_of_healthfacilityS??[],null,['class'=>'form-control','placeholder'=>'--select--']) !!}
						</div>
	
						{{-- <div class="form-group col-md-6">
							<label for="governorate"> @lang('equicare.Governorate') </label>
							<input type="text" name="governorate" class="form-control"
							value="{{ old('governorate') }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="directorate"> @lang('equicare.directorate') </label>
							<input type="text" name="directorate" class="form-control"
							value="{{ old('directorate') }}" />
						</div> --}}
						{{-- <div class="form-group col-md-6">
							<label for="type_of_healthfcility"> @lang('equicare.type_of_healthfcility') </label>
							<input type="text" type_of_healthfcility="name" class="form-control"
							value="{{ old('type_of_healthfcility') }}" />
						</div> --}}
						
						{{-- <div class="form-group col-md-6">
							<label for="Attachment_id"> @lang('equicare.Attachment') </label>
							<select name="Attachment_id" class="form-control">
								<option value="">---select---</option>
								@if(isset($hospitals))
									@foreach ($hospitals as $hospital)
										<option value="{{ $hospital->id }}"
											{{ old('Attachment_id')?'selected':'' }}
											>{{ $hospital->name }}
										</option>
									@endforeach
								@endif
							</select>
						</div> --}}

						{{-- <div class="form-group col-md-6">
							<label for="name"> @lang('equicare.Attachment') </label>
							<input type="text" name="name" class="form-control"
							value="{{ old('Attachment') }}" />
						</div> --}}


						<div class="form-group col-md-6">
							<label for="slug"> @lang('equicare.Short Name') </label>
							<input type="text" name="slug" class="form-control"
							value="{{ old('slug') }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="email"> @lang('equicare.email') </label>
							<input type="email" name="email" class="form-control" value="{{ old('email') }}"/>
						</div>
						<div class="form-group col-md-6">
							<label for="contact_person"> @lang('equicare.contact_person') </label>
							<input type="text" name="contact_person" class="form-control"
							value="{{ old('contact_person') }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="phone_no"> @lang('equicare.phone') </label>
							<input type="text" name="phone_no" class="form-control phone"
							value="{{ old('phone_no') }}" />
						</div>
						<div class="form-group col-md-6">
							<label for="mobile_no"> @lang('equicare.mobile') </label>
							<input type="text" name="mobile_no" class="form-control phone"
							value="{{ old('mobile_no') }}" />
						</div>
						{{-- <div class="form-group col-md-6">
							<label for="Directorates_id"> @lang('equicare.Directorates') </label>
							<select name="Directorates_id" class="form-control">
								<option value="">---select---</option>
								@if(isset($hospitals))
									@foreach ($hospitals as $hospital)
										<option value="{{ $hospital->id }}"
											{{ old('Directorates_id')?'selected':'' }}
											>{{ $hospital->name }}
										</option>
									@endforeach
								@endif
							</select>
						</div> --}}

						{{-- <div class="form-group col-md-6">
							<label for="Governorate_id"> @lang('equicare.Governorate') </label>
							<select name="Governorate_id" class="form-control">
								<option value="">---select---</option>
								@if(isset($hospitals))
									@foreach ($hospitals as $hospital)
										<option value="{{ $hospital->id }}"
											{{ old('Governorate_id')?'selected':'' }}
											>{{ $hospital->name }}
										</option>
									@endforeach
								@endif
							</select>
						</div> --}}



						<div class="form-group col-md-6">
							<label for="address"> @lang('equicare.address') </label>
							<textarea rows="3" name="address" class="form-control"
							>{{ old('address') }}</textarea>
						</div>
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