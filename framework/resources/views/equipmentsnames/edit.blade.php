@extends('layouts.admin')
@section('body-title')
	@lang('equicare.equipmentsnames')
@endsection
@section('title')
	| @lang('equicare.equipmentsnames')
@endsection
@section('breadcrumb')
	<li><a href="{{ route('equipmentsnames.index') }}">@lang('equicare.equipmentsnames')</a></li>
	<li class="active">@lang('equicare.edit_equipmentsname')</li>
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
							@lang('equicare.edit_equipmentsname')
						</h4>
					</div>
					<div class="box-body">
					@include ('errors.list')
						{!! Form::model($equipmentsnames,['url'=>['admin/equipmentsnames',$equipmentsnames->id],'method'=>'PATCH']) !!}
						<div class="row">
							{!! Form::hidden('id',null) !!}
							<div class="form-group col-md-6">
								{!! Form::label('name',__('equicare.name')) !!}
								{!! Form::text('name',null,['class' => 'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('code',__('equicare.code')) !!}
								{!! Form::text('code',null,['class' => 'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								<label for="sr_no"> @lang('equicare.serial_number') </label>
								<input type="text" name="sr_no" class="form-control"
								value="{{ old('sr_no') }}" />
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