<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ISO ScoreCard.</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('AdminLTE-master\bower_components\bootstrap/dist\css\bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master\bower_components\font-awesome\css\font-awesome.min.css')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset("images/apple-touch-icon.png")}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset("images/favicon-32x32.png")}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset("images/favicon-16x16.png")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master\bower_components\Ionicons\css\ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master\dist\css\AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminLTE-master\dist\css\skins\skin-green.min.css')}}">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>           
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                /* display: none; <- Crashes Chrome on hover */
                -webkit-appearance: none;
                margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
            }
            
            input[type=number] {
                -moz-appearance:textfield; /* Firefox */
            }
            
            </style>
</head>
<body class="hold-transition  skin-green fixed" style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>SO</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">ISO SCORECARD.</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          @yield('navigationBar')

          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title = "Non Conformities."aria-expanded="false">
              <i class="fa fa-flag text-yellow"></i> Issues
              
              
              
              
            </a>
            <ul class="dropdown-menu">
              <li class="header">The Following Are Your Issues.</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    @yield('closed')
                      <i class="fa fa-warning text-green"></i> Issues Closed.
                    </a>
                  </li>
                  <li>
                    @yield('inProgress')
                      <i class="fa fa-warning text-yellow"></i> Issues In Progress.
                    </a>
                  </li>
                  <li>
                    @yield('overdue')
                      <i class="fa fa-warning text-red"></i> OverDue Issues.
                    </a>
                  </li>                  
                </ul>
              </li>              
            </ul>
          </li>
          @if (   Session::get('name'))
                        <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{asset('images/HcMgk6Jq_400x400.jpg')}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span>{{ Session::get('name')}}</span>
             </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{asset('images/HcMgk6Jq_400x400.jpg')}}" class="img-circle" alt="User Image">

                <p>
               {{ Session::get('name')}}
                </p>

              </li>
              <!-- Menu Body -->              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                <a href="/loggingOutUsers" class="btn btn-default btn-flat">LogOut</a>
                </div>
              </li>
            </ul>
          </li>
          @else
              <script type="text/javascript">
                window.location = "{{ url('/login') }}";//here double curly bracket
              </script>
          @endif

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('images/HcMgk6Jq_400x400.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Session::get('name')}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">OPTIONS.</li>
        <!-- Optionally, you can add icons to the links -->
        {{-- <li class="active"><a href="#"><i class="fa fa-edit"></i> <span>User Manual </span></a></li> --}}

        

        <li>
          @yield('reports')
        </li>
        <li>
          @yield('trends')
        </li>
        <li>
          @yield('perspectiveTrends')
        </li>
        @yield('userEditingMatrices')
        @yield('video')      
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

        @yield('section')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 - 
      
      <script>
       document.write(new Date().getFullYear())
        </script>
      <a> Safaricom PLC.  </a></strong> All rights reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{asset('AdminLTE-master/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('AdminLTE-master/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE-master\dist\js\adminlte.min.js')}}"></script>
<script src="{{asset('js/accordion.js')}}"></script>
<script src="{{asset('js/verification.js')}}"></script>
<script src="{{asset('js/default.js')}}"></script>
<script src="{{asset('js/submittingKPIScores.js')}}"></script>
<script src="{{asset('js/submitNonConformities.js')}}"></script>
<script src="{{asset('js/submittingNewKPIs.js')}}"></script>
<script src="{{asset('js/submittingClosingNonConformity.js')}}"></script>
<script src="{{asset('js/deletingPerspetive.js')}}"></script>
<script src="{{asset('js/submittingDeletingPerspectives.js')}}"></script>
<script src="{{asset('js/editingPerspective.js')}}"></script>
<script src="{{asset('js/addingNewPerpsectives.js')}}"></script>
<script src="{{asset('js/selectingSpecificQuater.js')}}"></script>
<script src="{{asset('js/editingStrategicObjective.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="{{asset('js/subcategories.js')}}"></script>
<script src="{{asset('js/submittingSubcategories.js')}}"></script>
<script src="{{asset('js/closingtheSubCategories.js')}}"></script>


@include('sweetalert::alert')
@yield('charts')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     
</body>
</html>
