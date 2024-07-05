@extends('layouts.admin')
@section('body-title')
@lang('equicare.type_of_healthfacility')
@endsection
@section('title')
	| @lang('equicare.type_of_healthfacility')
@endsection
@section('breadcrumb')
	<li class=" active">@lang('equicare.type_of_healthfacility')</li>
@endsection
@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title">@lang('equicare.type_of_healthfacility')
							
							@if(
                            Auth::user()->hasDirectPermission('Create type_of_healthfacility'))
								<a href="{{ route('type_of_healthfacility.create') }}" class="btn btn-primary btn-flat">@lang('equicare.add_new')</a>
							@endif
						</h4>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover dataTable bottom-padding" id="data_table">
							<thead class="thead-inverse">
								<tr>
									<th> # </th>
									<th> @lang('equicare.name') </th>
									<th> @lang('equicare.category') </th>
								    <th> @lang('equicare.short_name') </th>
									<th> @lang('equicare.created_on') </th>
									@if (\Auth::user()->can('Edit type_of_healthfacility') || \Auth::user()->can('Delete type_of_healthfacility'))
									<th> @lang('equicare.action')</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@if (isset($type_of_healthfacility))
								@php
									$count = 0;
								@endphp
								@foreach ($type_of_healthfacility as $type_of_healthfacilitys)
								@php
									$count++;
								@endphp
								<tr>
								<td> {{ $count }} </td>
								<td> {{ ucfirst($type_of_healthfacilitys->name) }} </td>
								<th> {{ ucfirst($type_of_healthfacilitys->category) }} </th>
								<td>{{ $type_of_healthfacilitys->short_name ?? "-" }}</td> 
								<td> {{ $type_of_healthfacilitys->created_at->diffForHumans() }}</td>
								@if (\Auth::user()->hasDirectPermission('Edit type_of_healthfacility') || \Auth::user()->hasDirectPermission('Delete type_of_healthfacility'))
								<td class="todo-list">
									<div class="tools">
										{!! Form::open(['url' => 'admin/type_of_healthfacility/'.$type_of_healthfacilitys->id,'method'=>'DELETE','class'=>'form-inline']) !!}
										@if (\Auth::user()->hasDirectPermission('Edit type_of_healthfacility'))
											<a href="{{ route('type_of_healthfacility.edit',$type_of_healthfacilitys->id) }}" class="btn bg-purple btn-flat btn-sm" title="@lang('equicare.edit')"><i class="fa fa-edit"></i>  </a>
										@endif &nbsp;
				                            <input type="hidden" name="id" value="{{ $type_of_healthfacilitys->id }}">
										@if (\Auth::user()->hasDirectPermission('Delete type_of_healthfacility'))
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
									<th> @lang('equicare.category') </th>
									<th> @lang('equicare.short_name') </th>
									<th> @lang('equicare.created_on') </th>
									@if (\Auth::user()->hasDirectPermission('Edit type_of_healthfacility') || \Auth::user()->hasDirectPermission('Delete type_of_healthfacility'))
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