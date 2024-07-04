@extends('layouts.admin')
@section('body-title')
	@lang('equicare.test_and_calibrations')
@endsection
@section('title')
	| @lang('equicare.test_and_calibrations')
@endsection
@section('breadcrumb')
<li class="active">@lang('equicare.test_and_calibrations')</li>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
			<div class="box-header">
				<h4 class="box-title">@lang('equicare.manage_test_and_calibrations')
						@if(
							Auth::user()->hasDirectPermission('Create Test_and_calibrations'))
							<a href="{{ route('test_and_calibrations.create') }}" class="btn btn-primary btn-flat">@lang('equicare.add_new')</a></h4>
						@endif

				</div>

				<div class="box-body table-responsive">
					<table class="table table-bordered table-hover dataTable bottom-padding" id="data_table">
						<thead class="thead-inverse">
							<tr>
								<th> # </th>
								<th> @lang('equicare.name') </th>
								<th> @lang('equicare.email') </th>
								<th> @lang('equicare.user') </th>
								<th> @lang('equicare.governorate') </th>
								<th> @lang('equicare.directorate') </th>
								<th> @lang('equicare.type_of_healthfcility') </th>

								<th> @lang('equicare.slug') </th>

								<th> @lang('equicare.phone') </th>
								<th> @lang('equicare.mobile') </th>
								@if(Auth::user()->hasDirectPermission('Edit Test_and_calibrations') || Auth::user()->hasDirectPermission('Delete Test_and_calibrations'))
								<th> @lang('equicare.action')</th>
								@endif
							</tr>
						</thead>
						<tbody>
							@if (isset($test_and_calibrations))
							@php
								$count = 0;
							@endphp
							@foreach ($test_and_calibrations as $test_and_calibration)
							@php
								$count++;
							@endphp
							<tr>
							<td> {{ $count }} </td>
							<td> {{ ucfirst($test_and_calibration->name) }} </td>
							<td> {{  $test_and_calibration->date ?? '-' }}</td>
							{{-- <td> {{ $test_and_calibration->manufacturer ? ucfirst($test_and_calibration->user->name) : '-' }}</td> --}}
							<td> {{ $test_and_calibration->governorate ?? '-'}} </td>
							<td> {{ $test_and_calibration->directorate ?? '-'}} </td>
							<td> {{ $test_and_calibration->hospital_id?? '-'}} </td>
							<td> {{ $test_and_calibration->location ?? '-' }}</td>
							<td> {{ $test_and_calibration->technician ?? '-' }}</td>
							<td> {{ $test_and_calibration->test_type_incoming ?? '-' }}</td>
							<td> {{ $test_and_calibration->post_repair ?? '-' }}</td>
							<td> {{ $test_and_calibration->number ?? '-'}} </td>
							<td> {{ $test_and_calibration->model ?? '-'}} </td>
							@if(
							Auth::user()->hasDirectPermission('Edit Test_and_calibrations') || Auth::user()->hasDirectPermission('Delete Test_and_calibrations'))
                        	<td class="text-nowrap">
								{!! Form::open(['url' => 'admin/test_and_calibrations/'.$test_and_calibration->id,'method'=>'DELETE','class'=>'form-inline']) !!}
									{{-- @can('Edit Test_and_calibrations') --}}
									@if(Auth::user()->hasDirectPermission('Edit Test_and_calibrations'))
									<a href="{{ route('test_and_calibrations.edit',$test_and_calibration->id) }}" class="btn bg-purple btn-sm btn-flat" title="@lang('equicare.edit')"><i class="fa fa-edit"></i>  </a>
									{{-- @endcan  --}}
									&nbsp;
		                            @endif
		                            <input type="hidden" name="id" value="{{ $test_and_calibration->id }}">
									@if(Auth::user()->hasDirectPermission('Delete Test_and_calibrations'))

		                            {{-- @can('Delete Test_and_calibrations') --}}
		                            <button class="btn btn-warning btn-sm btn-flat" type="submit" onclick="return confirm('@lang('equicare.are_you_sure')')" title="@lang('equicare.delete')"><span class="fa fa-trash-o" aria-hidden="true"></span></button>
		                            {{-- @endcan --}}
		                            @endif
		                        {!! Form::close() !!}
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
								<th> @lang('equicare.email') </th>
								<th> @lang('equicare.user') </th>
								<th> @lang('equicare.governorate') </th>
								<th> @lang('equicare.directorate') </th>
								<th> @lang('equicare.hospitale') </th>

								<th> @lang('equicare.slug') </th>

								<th> @lang('equicare.phone') </th>
								<th> @lang('equicare.mobile') </th>
								@if(Auth::user()->hasDirectPermission('Edit Test_and_calibrations') || Auth::user()->hasDirectPermission('Delete Test_and_calibrations'))
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