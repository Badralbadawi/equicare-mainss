@extends('layouts.admin')
@section('body-title')
	@lang('equicare.departments')
@endsection
@section('title')
	| @lang('equicare.departments')
@endsection
@section('breadcrumb')
	<li><a href="{{ route('departments.index') }}">@lang('equicare.departments')</a></li>
	<li class="active">@lang('equicare.create_department')</li>
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
							@lang('equicare.create_department')
						</h4>
					</div>
					<div class="box-body">
					@include ('errors.list')
						{!! Form::open(['url'=>'admin/departments','method'=>'POST']) !!}
						<div class="row">
							<div id="inputContainer">
								<div  class="form-group col-md-4 equipment_stops_date_time_container">
									<label for="spare-part-quantity">@lang('equicare.SPARE_NO')  </label>
									{{-- <input type="text" class="form-control" placeholder="Input 1" name="SPARE_NO"  > --}}
		
									{!! Form::text('SPARE_NO[]', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!}
								  </div>
						
							  <div class="form-group col-md-4 equipment_stops_date_time_container">
								<label for="spare-part-name">  @lang('equicare.Spare Part Name') </label>
								{{-- <input type="text" class="form-control" placeholder="Input 2" name="spare_name "  > --}}
		
								{!! Form::text('spare_name[]', null, ['class' => 'form-control', 'id' => 'spare-part-name']) !!}
							  </div>
							  <div class="form-group col-md-4 equipment_stops_date_time_container">
								<label for="spare-part-quantity">@lang('equicare.Quantity')  </label>
								{{-- <input type="text" class="form-control" placeholder="Input 3" name="quantity"  > --}}
		
								{!! Form::text('quantity[]', null, ['class' => 'form-control', 'id' => 'spare-part-quantity']) !!}
							  </div>
							  <div class="form-group col-md-4 equipment_stops_date_time_container">
								<label for="spare-part-type">@lang('equicare.Type_SPARE') </label>
								{!! Form::text('type_sp[]', null, ['class' => 'form-control', 'id' => 'spare-part-type']) !!}
								{{-- <input type="text" class="form-control" placeholder="Input 4" name="type_sp"  > --}}
		
		
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