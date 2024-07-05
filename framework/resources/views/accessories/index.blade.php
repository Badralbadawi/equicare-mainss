@extends('layouts.admin')
@section('body-title')
@lang('equicare.accessories')
@endsection
@section('title')
	| @lang('equicare.accessories')
@endsection
@section('breadcrumb')
	<li class=" active">@lang('equicare.accessories')</li>
@endsection
@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title">@lang('equicare.manage_accessories')
							
							@if(
                            Auth::user()->hasDirectPermission('Create Accessories'))
								<a href="{{ route('accessories.create') }}" class="btn btn-primary btn-flat">@lang('equicare.add_new')</a>
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
									<th> @lang('equicare.quantity') </th>
									<th> @lang('equicare.piece_number') </th>
									<th> @lang('equicare.created_on') </th>
									@if (\Auth::user()->hasDirectPermission('Edit Accessories') || \Auth::user()->hasDirectPermission('Delete Accessories'))
									<th> @lang('equicare.action')</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@if (isset($accessories))
								@php
									$count = 0;
								@endphp
								@foreach ($accessories as $accessorie)
								@php
									$count++;
								@endphp
								<tr>
								<td> {{ $count }} </td>
								<td> {{ ucfirst($accessorie->name) }} </td>
								<td>{{ $accessorie->code_ac ?? "-" }}</td>
								<td>{{ $accessorie->quantity_ac ?? "-" }}</td>
								<td>{{ $accessorie->piece_number ?? "-" }}</td>
								<td> {{ $accessorie->created_at->diffForHumans() }}</td>
								@if (\Auth::user()->hasDirectPermission('Edit Accessories') || \Auth::user()->hasDirectPermission('Delete Accessories'))
								<td class="todo-list">
									<div class="tools">
										{!! Form::open(['url' => 'admin/accessories/'.$accessorie->id,'method'=>'DELETE','class'=>'form-inline']) !!}
										@if (\Auth::user()->hasDirectPermission('Edit Accessories'))
											<a href="{{ route('accessories.edit',$accessorie->id) }}" class="btn bg-purple btn-flat btn-sm" title="@lang('equicare.edit')"><i class="fa fa-edit"></i>  </a>
										@endif &nbsp;
				                            <input type="hidden" name="id" value="{{ $accessorie->id }}">
										@if (\Auth::user()->hasDirectPermission('Delete Accessories'))
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
									<th> @lang('equicare.quantity') </th>
									<th> @lang('equicare.piece_number') </th>
									<th> @lang('equicare.created_on') </th>
									@if (\Auth::user()->hasDirectPermission('Edit Accessories') || \Auth::user()->hasDirectPermission('Delete Accessories'))
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