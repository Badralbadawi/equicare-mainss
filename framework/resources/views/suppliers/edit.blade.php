@extends('layouts.admin')
@section('body-title')
	@lang('equicare.suppliers')
@endsection
@section('title')
	| @lang('equicare.suppliers')
@endsection
@section('breadcrumb')
	<li><a href="{{ route('suppliers.index') }}">@lang('equicare.suppliers')</a></li>
	<li class="active">@lang('equicare.edit_supplier')</li>
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
							@lang('equicare.edit_supplier')
						</h4>
					</div>
					<div class="box-body">
					@include ('errors.list')
					{!! Form::open(['url'=>'admin/suppliers','method'=>'POST']) !!}
						<div class="row">
							<div class="form-group col-md-6">
								{!! Form::label('name',__('equicare.name')) !!}
								{!! Form::text('name',null,['class' => 'form-control']) !!}
							</div>

							<div class="form-group col-md-6">
								{!! Form::label('email',__('equicare.email')) !!}
								{!! Form::text('email',null,['class' => 'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('phone_no',__('equicare.phone_no')) !!}
								{!! Form::text('phone_no',null,['class' => 'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('adress',__('equicare.adress')) !!}
								{!! Form::text('adress',null,['class' => 'form-control']) !!}
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