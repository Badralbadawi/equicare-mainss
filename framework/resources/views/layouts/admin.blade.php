<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ isset(App\Setting::first()->company) ? App\Setting::first()->company : config('app.name') }} @yield('title')</title>
  <link rel="icon" type="img/png" sizes="32x32" href="{{ asset('assets/1x/favicon.png') }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}">

  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  {{-- PNotify  --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pnotify.custom.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->

<link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/all.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  @yield('styles')
  <style type="text/css">
    .logo-lg img{
          height: 42px;
           @php($settings = App\Setting::first())
      @if ($settings != null)
    @endif
/*    width: 184px;*/
    padding-top: 6px;

    }
  </style>
</head>
<body class="hold-transition skin-black-light sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      @php($settings = App\Setting::first())
      @if ($settings != null)
        <span class="logo-mini">
          <b>
            @if($settings->company != null)
              {{ strtoupper(substr($settings->company, 0, 1)) }}
            @else
              E
            @endif
          </b>
        </span>
        <span class="logo-lg">
          @if($settings->logo != null)
          <img class="" alt="Medical Logo" src="{{ asset('uploads/'.$settings->logo) }}" ></img>
          @elseif($settings->company != null)
          <span class="logo-lg"><b>{{ $settings->company }}</b></span>
          @else
            <span class="logo-lg"><img src="{{ asset('assets/1x/logo.png') }}"></span>
          @endif
          </span>
      @else
        <span class="logo-lg"><img src="{{ asset('assets/1x/logo.png') }}"></span>
      @endif
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">@lang('equicare.toggle_navigation')</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav pull-right">
           <li class="nav-item dropdown">
            <a href="#" class=" nav-link familyfont" data-toggle="dropdown" area-expanded="false">
              <i class="fa fa-user"></i>
              <span class="hidden-xs">&nbsp;&nbsp;{{ ucfirst(Auth::user()->name) ?? 'No User' }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="{{ $page=='Change Password'?'active':'' }}">
                <a class="dropdown-item" href="{{ route('change-password') }}">
                  <i class="fa fa-key"></i>&nbsp;
                  @lang('equicare.change_password')
                </a>
              </li>
              <li>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               <i class="fa fa-sign-out"></i>&nbsp;
               @lang('equicare.logout')

              </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="none-display;">
              {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
      </ul>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="{{ $page=='/home'?'active':'' }}">
          <a href="{{ url('/admin/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>@lang('equicare.dashboard')</span>
          </a>
        </li>

        <li class="{{ $page=='governorates'?'active':'' }}">
          {{-- <a href="{{ url('/admin/accessories') }}"> --}}
            <a href="{{ url('/admin/governorates') }}">
            <i class="fa fa-wrench"></i> <span>@lang('equicare.Governorate')</span>
          </a>
        </li>
        <li class="{{ $page=='directorates'?'active':'' }}">
          <a href="{{ url('/admin/directorates') }}">
          <i class="fa fa-wrench"></i> <span>@lang('equicare.Directorate')</span>
        </a>
      </li>

        {{-- <li >
          {{-- <a href="{{ url('/admin/accessories') }}"> --}}
            {{-- <a href="{{ url('/admin/Directorates') }}">
            <i class="fa fa-wrench"></i> <span>@lang('equicare.Directorates')</span>
          </a>
        </li>  --}}
        <li class="{{ $page=='type_of_healthfacility'?'active':'' }}">
          <a href="{{ url('/admin/type_of_healthfacility') }}">
            <i class="fa fa-hospital-o"></i> <span>@lang('equicare.type_of_healthfacility')</span>
          </a>
        </li>

        <li class="{{ $page=='hospitals'?'active':'' }}">
          <a href="{{ url('/admin/hospitals') }}">
            <i class="fa fa-hospital-o"></i> <span>@lang('equicare.hospital')</span>
          </a>
        </li>


        <li class="{{ $page=='evaluation_scans'?'active':'' }}">
          <a href="{{ url('/admin/evaluation_scans') }}">
            <i class="fa fa-hospital-o"></i> <span>@lang('equicare.create_Evaluation_scan')</span>
          </a>
        </li>

        <li class="{{ $page=='departments'?'active':'' }}">
          <a href="{{ url('/admin/departments') }}">
            <i class="fa fa-wrench"></i> <span>@lang('equicare.departments')</span>
          </a>
        </li>
        <li class="{{ $page=='equipments'?'active':'' }}">
          <a href="{{ url('/admin/equipments') }}">
            <i class="fa fa-stethoscope"></i> <span>@lang('equicare.equipments')</span>
          </a>
        </li>
        <li class="{{ $page=='accessories'?'active':'' }}">
          <a href="{{ url('/admin/accessories') }}">
            <i class="fa fa-stethoscope"></i> <span>@lang('equicare.accessories')</span>
          </a>
          <li class="{{ $page=='equipmentsnames'?'active':'' }}">
            <a href="{{ url('/admin/equipmentsnames') }}">
              <i class="fa fa-stethoscope"></i> <span>@lang('equicare.equipmentsnames')</span>
            </a>
          </li>
          <li class="{{ $page=='pieces'?'active':'' }}">
            <a href="{{ url('/admin/pieces') }}">
              <i class="fa fa-stethoscope"></i> <span>@lang('equicare.pieces')</span>
            </a>
          </li>
          </li>
          <li class="{{ $page=='suppliers'?'active':'' }}">
            <a href="{{ url('/admin/suppliers') }}">
              <i class="fa fa-stethoscope"></i> <span>@lang('equicare.suppliers')</span>
            </a>
          </li>
  


        
        {{-- <li class="{{ $page=='evaluation_scans'?'active':'' }}">
          <a href="{{ url('/admin/evaluation_scans') }}">
            <i class="fa fa-stethoscope"></i> <span>@lang('equicare.evaluation_scans')</span>
          </a>
        </li> --}}


        <li class="{{ $page=='manage_Maintenance'?'active':'' }}">
          <a href="{{ url('admin/call/breakdown_maintenance') }}">
          <i class="fa fa-wrench"></i> <span>@lang('equicare.manage_Maintenance')</span>
          </a>
        </li>

        {{-- <li class="{{ $page=='preventive_maintenance'?'active':'' }}">
          <a href="{{ url('admin/call/preventive_maintenance') }}">
            <i class="fa fa-barcode"></i> @lang('equicare.preventive_maintenance')
          </a>
        </li> --}}


        <li class="{{ $page=='manage_Calibration'?'active':'' }}">
          <a href="{{ url('admin/calibration') }}">
          <i class="fa fa-balance-scale"></i> <span>@lang('equicare.manage_Calibration')</span>
          </a>
        </li>

        <li class="{{ $page=='manage_Training'?'active':'' }}">
          <a href="{{ url('/admin/Training') }}">
            <i class="fa fa-user"></i> <span>@lang('equicare.manage_Training')</span>
          </a>
        </li>
        <li class="{{ $page=='manage_Equipment'?'active':'' }}">
          <a href="{{ url('/admin/equipments') }}">
            <i class="fa fa-stethoscope"></i> <span>@lang('equicare.manage_Equipment')</span>
          </a>
        </li>
        <li class="{{ $page=='test_and_calibrations'?'active':'' }}">
          <a href="{{ url('admin/test_and_calibrations') }}">
            <i class="fa fa-balance-scale"></i> <span>@lang('equicare.test_and_calibrations')</span>
          </a>
        </li>



        
        @if($page == "breakdown_maintenance" || $page == "preventive_maintenance")
            @php($class="treeview menu-open")
            @php($active = "active")
            @php($menu="style=display:block;")
            @else
            @php($class="treeview")
            @php($active = "")
            @php($menu="")
            @endif

         <li class="{{ $class }} {{ $active }}">
          <a href="#" class="">
            <i class="fa fa-gear"></i> <span>@lang('equicare.Service Request')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" {{ $menu }}>
            <li class="{{ $page=='breakdown_maintenance'?'active':'' }}">
              <a href="{{ url('admin/call/breakdown_maintenance') }}">
                <i class="fa fa-minus-circle"></i> @lang('equicare.breakdown_maintenance')
              </a>
            </li>
            <li class="{{ $page=='preventive_maintenance'?'active':'' }}">
              <a href="{{ url('admin/call/preventive_maintenance') }}">
                <i class="fa fa-barcode"></i> @lang('equicare.preventive_maintenance')
              </a>
            </li>
            <li class="{{ $page=='preventive_maintenance'?'active':'' }}">
              <a href="{{ url('admin/call/preventive_maintenance') }}">
                <i class="fa fa-barcode"></i> @lang('equicare.Request equipment')
              </a>
            </li>

            <li class="{{ $page=='preventive_maintenance'?'active':'' }}">
              <a href="{{ url('admin/call/preventive_maintenance') }}">
                <i class="fa fa-barcode"></i> @lang('equicare.training request')
              </a>
            </li>

            <li class="{{ $page=='calibrations'?'active':'' }}">
              <a href="{{ url('admin/calibration') }}">
                <i class="fa fa-balance-scale"></i> <span>@lang('equicare.calibrations')</span>
              </a>
            </li>
    

          </ul>
        </li>


        <li class="{{ $page=='maintenance_cost'?'active':'' }}">
          <a href="{{ url('admin/maintenance_cost') }}">
            <i class="fa fa-usd"></i> <span>@lang('equicare.maintenance_cost')</span>
          </a>
        </li>
        @if($page == "reports/time_indicator" || $page == "reports/equipments")
            @php($class="treeview menu-open")
            @php($active = "active")
            @php($menu="style=display:block;")
            @else
            @php($class="treeview")
            @php($active = "")
            @php($menu="")
            @endif
        <li class="{{ $class }} {{ $active }}">
          <a href="#" class="">
            <i class="fa fa-th"></i> <span>@lang('equicare.reports')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" {{ $menu }}>
            <li class="{{ $page=='reports/time_indicator'?'active':'' }}">
              <a href="{{ url('admin/reports/time_indicator') }}">
                <i class="fa fa-clock-o"></i> <span>@lang('equicare.time_indicator')</span>
              </a>
            </li>
            <li class="{{ $page=='reports/equipments'?'active':'' }}">
              <a href="{{ url('admin/reports/equipments') }}">
                <i class="fa fa-wrench"></i> <span>@lang('equicare.equipment_report')</span>
              </a>
            </li>
          </ul>
        </li>
        @php($date = date('Y-m-d',strtotime('+15 days')))
        @php($preventive_reminder_count = \App\CallEntry::where('call_type','preventive')->where('next_due_date','<=',$date)->count())
        @php($calibrations_reminder_count = \App\Calibration::where('due_date','<=',$date)->count())
        @if($page == "preventive_maintenance_reminder" || $page == "calibrations_reminder")
            @php($class="treeview menu-open")
            @php($active = "active")
            @php($menu="style=display:block;")
            @else
            @php($class="treeview")
            @php($active = "")
            @php($menu="")
            @endif
        <li class="{{ $class }} {{ $active }}">
          <a href="#" class="">
            <i class="fa fa-clock-o"></i> <span>@lang('equicare.reminder')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" {{ $menu }}>
            <li class="{{ $page=='preventive_maintenance_reminder'?'active':'' }}">
              <a href="{{ url('admin/reminder/preventive_maintenance') }}">
                <i class="fa fa-barcode"></i> <span>@lang('equicare.preventive_reminder')</span>
                @if($preventive_reminder_count > 0)
                <span class="badge label-danger">{{ $preventive_reminder_count }}</span>
                @endif
              </a>
            </li>
            <li class="{{ $page=='calibrations_reminder'?'active':'' }}">
              <a href="{{ url('admin/reminder/calibration') }}">
                <i class="fa fa-balance-scale"></i> <span>@lang('equicare.calibrations_reminder')</span>
                @if($calibrations_reminder_count > 0)
                <span class="badge label-danger">{{ $calibrations_reminder_count }}</span>
                @endif
              </a>
            </li>
          </ul>
        </li>
        <li class="{{ $page=='calibrations_sticker'?'active':'' }}">
          <a href="{{ url('admin/calibrations_sticker') }}">
            <i class="fa fa-tags"></i> <span>@lang('equicare.calibrations_sticker')</span>
          </a>
        </li>

        @role('Admin')
        <li class="{{ $page=='settings'?'active':'' }}">
          <a href="{{ url('admin/settings') }}">
            <i class="fa fa-cog"></i> <span>@lang('equicare.settings')</span>
          </a>
        </li>

        @if($page == "users" || $page == "roles" || $page == "permissions")
            @php($class="treeview menu-open")
            @php($active = "active")
            @php($menu="style=display:block;")
            @else
            @php($class="treeview")
            @php($active = "")
            @php($menu="")
            @endif

         <li class="{{ $class }} {{ $active }}">
          <a href="#" class="">
            <i class="fa fa-users"></i> <span>@lang('equicare.user_permission')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" {{ $menu }}>
            <li class="{{ $page=='users'?'active':'' }}">
              <a href="{{ url('admin/permissions') }}">
                <i class="fa fa-user"></i> @lang('equicare.user_permission')
              </a>
            </li>
            <li class="{{ $page=='users'?'active':'' }}">
              <a href="{{ url('admin/users') }}">
                <i class="fa fa-user"></i> @lang('equicare.users')
              </a>
            </li>
            <li class="{{ $page=='roles'?'active':'' }}">
              <a href="{{ url('admin/roles') }}">
                <i class="fa fa-unlock-alt"></i> @lang('equicare.roles')
              </a>
            </li>
          </ul>
        </li>
        @endrole
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pt-0">

      @if(url()->current() == url('/'))
        <h1>
          @lang('equicare.dashboard')
        </h1>
      @else
        <h1>@yield('body-title')</h1>
      @endif
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> @lang('equicare.home')</a></li>
        @yield('breadcrumb')
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0.1
    </div>
    <strong>@lang('equicare.copyright') &copy; 2019-{{ date('Y') }} <a href="https://hyvikk.com" target="_blank">Hyvikk</a>.</strong> @lang('equicare.all_rights_reserved').
  </footer>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- daterangepicker -->
<script src="{{ asset('assets/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
{{-- PNotify --}}
<script src="{{ asset('assets/js/pnotify.custom.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
 <script src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_minimal-blue',
      // increaseArea: '20%' /* optional */
    });
  });
</script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/js/demo.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){
     @if(session('flash_message'))
      new PNotify({
              title: ' Success!',
              text: "{{ session('flash_message') }}",
              type: 'success',
              delay: 3000,
              nonblock: {
                nonblock: true
              }
          });
    @endif
    @if(session('flash_message_error'))
      new PNotify({
              title: ' Warning!',
              text: "{{ session('flash_message_error') }}",
              type: 'warning',
              delay: 3000,
              nonblock: {
                nonblock: true
              }
          });
    @endif
  });
 
</script>
@yield('scripts')
</body>
</html>
