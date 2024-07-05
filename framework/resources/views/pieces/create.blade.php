@extends('layouts.admin')
@section('body-title')
	@lang('equicare.pieces')
@endsection
@section('title')
	| @lang('equicare.pieces')
@endsection
@section('breadcrumb')
	<li><a href="{{ route('pieces.index') }}">@lang('equicare.pieces')</a></li>
	<li class="active">@lang('equicare.create_piece')</li>
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
							@lang('equicare.create_piece')
						</h4>
					</div>
					<div class="box-body">
					@include ('errors.list')
						{!! Form::open(['url'=>'admin/pieces','method'=>'POST']) !!}
						<div class="row">
							<div class="form-group col-md-6">
								{!! Form::label('name',__('equicare.name')) !!}
								{!! Form::text('name',null,['class' => 'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('type_pi',__('equicare.type_pi')) !!}
								{!! Form::text('type_pi',null,['class' => 'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('numper_pi',__('equicare.numper_pi')) !!}
								{!! Form::text('numper_pi',null,['class' => 'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('code_pi',__('equicare.code')) !!}
								{!! Form::text('code_pi',null,['class' => 'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('quantity_pi',__('equicare.quantity')) !!}
								{!! Form::text('quantity_pi',null,['class' => 'form-control']) !!}
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