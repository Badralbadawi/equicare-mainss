@extends('layouts.admin')
@section('body-title')
	@lang('equicare.accessories')
@endsection
@section('title')
	| @lang('equicare.accessories')
@endsection
@section('breadcrumb')
	<li><a href="{{ route('accessories.index') }}">@lang('equicare.accessories')</a></li>
	<li class="active">@lang('equicare.edit_accessorie')</li>
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
							@lang('equicare.edit_accessorie')
						</h4>
					</div>
					<div class="box-body">
					@include ('errors.list')
						{!! Form::model($accessories,['url'=>['admin/accessories',$accessories->id],'method'=>'PATCH']) !!}
						<div class="row">
							{!! Form::hidden('id',null) !!}
							<div class="form-group col-md-6">
								{!! Form::label('name',__('equicare.name')) !!}
								{!! Form::text('name',null,['class' => 'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('code_ac',__('equicare.code')) !!}
								{!! Form::text('code_ac',null,['class' => 'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('quantity_ac',__('equicare.quantity')) !!}
								{!! Form::text('quantity_ac',null,['class' => 'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('piece_number',__('equicare.piece_number')) !!}
								{!! Form::text('piece_number',null,['class' => 'form-control']) !!}
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