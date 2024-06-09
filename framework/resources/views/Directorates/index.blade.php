@extends('layouts.admin')
@section('body-title')
@lang('equicare.directorates')
@endsection
@section('title')
	| @lang('equicare.directorates')
@endsection
@section('breadcrumb')
	<li class=" active">@lang('equicare.directorates')</li>
@endsection
@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-header with-border">
					<h4 class="box-title">@lang('equicare.manage_directorates')
							
							@if(
                            Auth::user()->hasDirectPermission('Create Directorates'))
								<a href="{{ route('directorates.create') }}" class="btn btn-primary btn-flat">@lang('equicare.add_new')</a>
							@endif
						</h4>
					{{-- </div>
					<div class="form-group col-md-3">
						<label>@lang('equicare.Governorate'): </label>
						<select name="governorate_id" class="form-control">
							<option value="">@lang('equicare.select')</option>
							@if(isset($governorates))
							@foreach ($governorates as $governorate)
							<option value="{{ $governorate->id }}"
								@if(isset($governorate_id) && $governorate_id==$governorate->id)
								selected
								@endif
								>
								{{ ucfirst($governorate->name) }}
							</option>
							@endforeach
							@endif
						</select>
					</div> --}}
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover dataTable bottom-padding" id="data_table">
							<thead class="thead-inverse">
								<tr>
									<th> # </th>
									<th> @lang('equicare.name') </th>
									<th> @lang('equicare.short_name') </th>
									<th> @lang('equicare.created_on') </th>
									<th> @lang('equicare.Governorate') </th>
									@if (\Auth::user()->hasDirectPermission('Edit Directorates') || \Auth::user()->hasDirectPermission('Delete Directorates'))
									<th> @lang('equicare.action')</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@if (isset($directorates))
								@php
									$count = 0;
								@endphp
								@foreach ($directorates as $directorate)
								@php
									$count++;
								@endphp
								<tr>
								<td> {{ $count }} </td>
								<td> {{ ucfirst($directorate->name) }} </td>
								<td>{{ $directorate->short_name ?? "-" }}</td>
								<td>{{($directorate->governorate->short_name)??"-" }} ({{ ($directorate->governorate->name) ??'-' }})</td>
								@php
								$uids = explode('/', $directorate->unique_id);
								
								if (count($uids) < 2) {
									// Handle the case where the $directorate->unique_id is not in the expected format
									$governorate_id = null;
									$uids = [$directorate->unique_id];
								} else {
									$governorate_id = $uids[1];
								
									$governorate = \App\Governorate::withTrashed()->find($governorate_id);
								
									if (!is_null($governorate)) {
										$uids[1] = $governorate->short_name;
									} else {
										// Handle the case where the $governorate_id is not valid
									}
								}
								
								$uids = implode('/', $uids);
								@endphp
								{{-- <td>{{ $directorate->governorate?$diretorate->governorate->name:'-' }}</td> --}}
								<td> {{ $directorate->created_at->diffForHumans()}}</td>

								@if (\Auth::user()->hasDirectPermission('Edit Directorates') || \Auth::user()->hasDirectPermission('Delete Directorates'))
								
								<td class="todo-list">
									<div class="tools">
										{!! Form::open(['url' =>'admin/directorates/'.$directorate->id,'method'=>'DELETE','class'=>'form-inline']) !!}
										@if (\Auth::user()->hasDirectPermission('Edit Directorates'))
											<a href="{{ route('directorates.edit',$directorate->id) }}" class="btn bg-purple btn-flat btn-sm" title="@lang('equicare.edit')"><i class="fa fa-edit"></i>  </a>
										@endif &nbsp;
				                            <input type="hidden" name="id" value="{{ $directorate->id }}">
										@if (\Auth::user()->hasDirectPermission('Delete Directorates'))
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
									<th> @lang('equicare.Governorate') </th>
									<th> @lang('equicare.created_on') </th>
									@if (\Auth::user()->hasDirectPermission('Edit Directorates') || \Auth::user()->hasDirectPermission('Delete Directorates'))
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