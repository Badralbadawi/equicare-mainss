@extends('layouts.admin')
@section('body-title')
	@lang('equicare.edit_type_of_healthfacility')
@endsection
@section('title')
	| @lang('equicare.edit_type_of_healthfacility')
@endsection
@section('breadcrumb')
	<li><a href="{{ route('type_of_healthfacility.index') }}">@lang('equicare.edit_type_of_healthfacility')</a></li>
	<li class="active">@lang('equicare.edit_type_of_healthfacility')</li>
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
							@lang('equicare.type_of_healthfacility')
						</h4>
					</div>
					<div class="box-body">
					@include ('errors.list')
						{!! Form::model($type_of_healthfacility,['url'=>['admin/type_of_healthfacility',$type_of_healthfacility->id],'method'=>'PATCH']) !!}
						<div class="row">
							{!! Form::hidden('id',null) !!}
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