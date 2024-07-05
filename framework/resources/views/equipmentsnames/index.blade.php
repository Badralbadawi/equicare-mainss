@extends('layouts.admin')
@section('body-title')
@lang('equicare.equipmentsnames')
@endsection
@section('title')
	| @lang('equicare.equipmentsnames')
@endsection
@section('breadcrumb')
	<li class=" active">@lang('equicare.equipmentsnames')</li>
@endsection
@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title">@lang('equicare.manage_equipmentsnames')
							
							@if(
                            Auth::user()->hasDirectPermission('Create EquipmentNames'))
								<a href="{{ route('equipmentsnames.create') }}" class="btn btn-primary btn-flat">@lang('equicare.add_new')</a>
							@endif
						</h4>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover dataTable bottom-padding" id="data_table">
							<thead class="thead-inverse">
								<tr>
									<th> # </th>
									<th> @lang('equicare.name') </th>
									<th> @lang('equicare.code') </th>
									<th> @lang('equicare.serial_no') </th>
									<th> @lang('equicare.created_on') </th>
									@if (\Auth::user()->hasDirectPermission('Edit EquipmentNames') || \Auth::user()->hasDirectPermission('Delete EquipmentNames'))
									<th> @lang('equicare.action')</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@if (isset($equipmentsnames))
								@php
									$count = 0;
								@endphp
								@foreach ($equipmentsnames as $equipmentsname)
								@php
									$count++;
								@endphp
								<tr>
								<td> {{ $count }} </td>
								<td> {{ ucfirst($equipmentsname->name) }} </td>
								<td>{{ $equipmentsname->code ?? "-" }}</td>
								<td>{{ $equipmentsname->sr_no }}</td>
								<td> {{ $equipmentsname->created_at->diffForHumans() }}</td>
								@if (\Auth::user()->hasDirectPermission('Edit EquipmentNames') || \Auth::user()->hasDirectPermission('Delete EquipmentNames'))
								<td class="todo-list">
									<div class="tools">

										{!! Form::open(['url' => 'admin/equipmentsnames/'.$equipmentsname->id,'method'=>'DELETE','class'=>'form-inline']) !!}
										@if (\Auth::user()->hasDirectPermission('Edit EquipmentNames'))
											<a href="{{ route('equipmentsnames.edit',$equipmentsname->id) }}" class="btn bg-purple btn-flat btn-sm" title="@lang('equicare.edit')"><i class="fa fa-edit"></i>  </a>
										@endif &nbsp;
				                            <input type="hidden" name="id" value="{{ $equipmentsname->id }}">
										@if (\Auth::user()->hasDirectPermission('Delete EquipmentNames'))
				                            <button class="btn btn-warning btn-flat btn-sm" type="submit" onclick="return confirm('@lang('equicare.are_you_sure')')" title="@lang('equicare.delete')"><span class="fa fa-trash-o" aria-hidden="true"></span></button>
				                        @endif
				                        {!! Form::close() !!}
									</div>
								</td>
								@endif
								</tr>
								@endforeach
								@endif
							</tbody>
							<tfoot>
								<tr>
									<th> # </th>
									<th> @lang('equicare.name') </th>
									<th> @lang('equicare.code') </th>
									<th> @lang('equicare.serial_no') </th>
									<th> @lang('equicare.created_on') </th>
									@if (\Auth::user()->hasDirectPermission('Edit EquipmentNames') || \Auth::user()->hasDirectPermission('Delete EquipmentNames'))
									<th> @lang('equicare.action')</th>
									@endif
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
@endsection