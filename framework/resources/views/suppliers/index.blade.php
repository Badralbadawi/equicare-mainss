@extends('layouts.admin')
@section('body-title')
@lang('equicare.suppliers')
@endsection
@section('title')
	| @lang('equicare.suppliers')
@endsection
@section('breadcrumb')
	<li class=" active">@lang('equicare.suppliers')</li>
@endsection
@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title">@lang('equicare.manage_suppliers')
							
							@if(
                            Auth::user()->hasDirectPermission('Create Suppliers'))
								<a href="{{ route('suppliers.create') }}" class="btn btn-primary btn-flat">@lang('equicare.add_new')</a>
							@endif
						</h4>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover dataTable bottom-padding" id="data_table">
							<thead class="thead-inverse">
								<tr>
									<th> # </th>
									<th> @lang('equicare.name') </th>
									<th> @lang('equicare.emial') </th>
									<th> @lang('equicare.phone_no') </th>
									<th> @lang('equicare.adress') </th>
									<th> @lang('equicare.created_on') </th>
									@if (\Auth::user()->hasDirectPermission('Edit Suppliers') || \Auth::user()->hasDirectPermission('Delete Suppliers'))
									<th> @lang('equicare.action')</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@if (isset($suppliers))
								@php
									$count = 0;
								@endphp
								@foreach ($suppliers as $supplier)
								@php
									$count++;
								@endphp
								<tr>
								<td> {{ $count }} </td>
								<td> {{ ucfirst($supplier->name) }} </td>
								<td>{{ $supplier->phone_no ?? "-" }}</td>
								<td>{{ $supplier->email ?? "-"}}</td>
								<td>{{ $supplier->adress ?? "-" }}</td>
								<td> {{ $supplier->created_at->diffForHumans() }}</td>
								@if (\Auth::user()->hasDirectPermission('Edit Suppliers') || \Auth::user()->hasDirectPermission('Delete Suppliers'))
								<td class="todo-list">
									<div class="tools">

										{!! Form::open(['url' => 'admin/suppliers/'.$supplier->id,'method'=>'DELETE','class'=>'form-inline']) !!}
										@if (\Auth::user()->hasDirectPermission('Edit Suppliers'))
											<a href="{{ route('suppliers.edit',$supplier->id) }}" class="btn bg-purple btn-flat btn-sm" title="@lang('equicare.edit')"><i class="fa fa-edit"></i>  </a>
										@endif &nbsp;
				                            <input type="hidden" name="id" value="{{ $supplier->id }}">
										@if (\Auth::user()->hasDirectPermission('Delete Suppliers'))
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
									<th> @lang('equicare.emial') </th>
									<th> @lang('equicare.phone_no') </th>
									<th> @lang('equicare.adress') </th>
									<th> @lang('equicare.created_on') </th>
									@if (\Auth::user()->hasDirectPermission('Edit Suppliers') || \Auth::user()->hasDirectPermission('Delete Suppliers'))
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