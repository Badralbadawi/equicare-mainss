@extends('layouts.admin')
@section('body-title')
@lang('equicare.pieces')
@endsection
@section('title')
	| @lang('equicare.pieces')
@endsection
@section('breadcrumb')
	<li class=" active">@lang('equicare.pieces')</li>
@endsection
@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title">@lang('equicare.manage_pieces')
							
							@if(
                            Auth::user()->hasDirectPermission('Create Pieces'))
								<a href="{{ route('pieces.create') }}" class="btn btn-primary btn-flat">@lang('equicare.add_new')</a>
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
									<th> @lang('equicare.type_pi') </th>
									<th> @lang('equicare.numper_pi') </th>
									<th> @lang('equicare.quantity') </th>
									<th> @lang('equicare.created_on') </th>
									@if (\Auth::user()->hasDirectPermission('Edit Pieces') || \Auth::user()->hasDirectPermission('Delete Pieces'))
									<th> @lang('equicare.action')</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@if (isset($pieces))
								@php
									$count = 0;
								@endphp
								@foreach ($pieces as $piece)
								@php
									$count++;
								@endphp
								<tr>
								<td> {{ $count }} </td>
								<td> {{ ucfirst($piece->name) }} </td>
								<td>{{ $piece->code_pi ?? "-"}}</td>
								<td>{{ $piece->type_pi ??"-"}}</td>
								<td>{{ $piece->numper_pi ?? "-"}}</td>
								<td>{{ $piece->quantity_pi ?? "-"}}</td>
								<td> {{ $piece->created_at->diffForHumans() }}</td>
								@if (\Auth::user()->hasDirectPermission('Edit Pieces') || \Auth::user()->hasDirectPermission('Delete Pieces'))
								<td class="todo-list">
									<div class="tools">

										{!! Form::open(['url' => 'admin/pieces/'.$piece->id,'method'=>'DELETE','class'=>'form-inline']) !!}
										@if (\Auth::user()->hasDirectPermission('Edit Pieces'))
											<a href="{{ route('pieces.edit',$piece->id) }}" class="btn bg-purple btn-flat btn-sm" title="@lang('equicare.edit')"><i class="fa fa-edit"></i>  </a>
										@endif &nbsp;
				                            <input type="hidden" name="id" value="{{ $piece->id }}">
										@if (\Auth::user()->hasDirectPermission('Delete Pieces'))
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
									<th> @lang('equicare.type_pi') </th>
									<th> @lang('equicare.numper_pi') </th>
									<th> @lang('equicare.quantity') </th>
									<th> @lang('equicare.created_on') </th>
									@if (\Auth::user()->hasDirectPermission('Edit Pieces') || \Auth::user()->hasDirectPermission('Delete Pieces'))
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