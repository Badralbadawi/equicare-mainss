@extends('layouts.admin')
@section('body-title')
	@lang('equicare.governorates')
@endsection
@section('title')
	| @lang('equicare.governorates')
@endsection
@section('breadcrumb')
	<li><a href="{{ route('governorates.index') }}">@lang('equicare.governorates')</a></li>
	<li class="active">@lang('equicare.create_governorate')</li>
@endsection
@section('styles')
	<style type="text/css">
		.mt-2{
			margin-top: 10px;
		}
	</style>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
					<div class="box-header with-border">
						<h4 class="box-title">
							@lang('equicare.create_governorate')
						</h4>
					</div>
					<div class="box-body">
					@include ('errors.list')
						{!! Form::open(['url'=>'admin/governorates','method'=>'POST']) !!}
						<div class="row">
							<div class="form-group col-md-6">
								{!! Form::label('name',__('equicare.name')) !!}
								{!! Form::text('name',null,['class' => 'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('short_name',__('equicare.short_name_e')) !!}
								{!! Form::text('short_name',null,['class' => 'form-control']) !!}
							</div>

							<div class="form-group col-md-12">
								{!! Form::submit(__('equicare.submit'),['class' => 'btn btn-primary btn-flat']) !!}
							</div>
						</div>
						{!! Form::close() !!}
					</div>
			</div>
		</div>
	</div>
@endsection