@extends('layouts.admin')
@section('body-title')
@lang('equicare.governorates')
@endsection
@section('title')
	| @lang('equicare.governorates')
@endsection
@section('breadcrumb')
	<li class=" active">@lang('equicare.governorates')</li>
@endsection
@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title">@lang('equicare.manage_governorates')
							
							@if(
                            Auth::user()->hasDirectPermission('Create Governorates'))
								<a href="{{ route('governorates.create') }}" class="btn btn-primary btn-flat">@lang('equicare.add_new')</a>
							@endif
						</h4>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover dataTable bottom-padding" id="data_table">
							<thead class="thead-inverse">
								<tr>
									<th> # </th>
									<th> @lang('equicare.name') </th>
									<th> @lang('equicare.short_name') </th>
									<th> @lang('equicare.created_on') </th>
									@if (\Auth::user()->hasDirectPermission('Edit Governorates') || \Auth::user()->hasDirectPermission('Delete Governorates'))
									<th> @lang('equicare.action')</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@if (isset($governorates))
								@php
									$count = 0;
								@endphp
								@foreach ($governorates as $governorate)
								@php
									$count++;
								@endphp
								<tr>
								<td> {{ $count }} </td>
								<td> {{ ucfirst($governorate->name) }} </td>
								<td>{{ $governorate->short_name ?? "-" }}</td>
								<td> {{ $governorate->created_at->diffForHumans() }}</td>
								@if (\Auth::user()->hasDirectPermission('Edit Governorates') || \Auth::user()->hasDirectPermission('Delete Governorates'))
								<td class="todo-list">
									<div class="tools">
										{!! Form::open(['url' => 'admin/governorates/'.$governorate->id,'method'=>'DELETE','class'=>'form-inline']) !!}
										@if (\Auth::user()->hasDirectPermission('Edit Governorates'))
											<a href="{{ route('governorates.edit',$governorate->id) }}" class="btn bg-purple btn-flat btn-sm" title="@lang('equicare.edit')"><i class="fa fa-edit"></i>  </a>
										@endif &nbsp;
				                            <input type="hidden" name="id" value="{{ $governorate->id }}">
										@if (\Auth::user()->hasDirectPermission('Delete Governorates'))
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
									<th> @lang('equicare.short_name') </th>
									<th> @lang('equicare.created_on') </th>
									@if (\Auth::user()->hasDirectPermission('Edit Governorates') || \Auth::user()->hasDirectPermission('Delete Governorates'))
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