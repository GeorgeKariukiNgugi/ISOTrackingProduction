<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ISO ScoreCard.</title>
  <!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset("images/apple-touch-icon.png")}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset("images/favicon-32x32.png")}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset("images/favicon-16x16.png")}}">
  <link rel="stylesheet" href="{{asset('AdminLTE-master\bower_components\bootstrap\dist\css\bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master\bower_components\font-awesome\css\font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master\bower_components\Ionicons\css\ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master\dist\css\AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('AdminLTE-master\dist\css\skins\skin-green.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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
            .redAlert{
              background-color: red;
            }
            </style>
</head>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition  skin-green  sidebar-mini" style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
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
          <!-- User Account Menu -->
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
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('images/HcMgk6Jq_400x400.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <br>
        <li class="header" style="color:white;font-decoration:bold;">OPTIONS.</li>
        <br>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="/home/0"><i class="fa fa-home"></i> <span>Home</span></a></li>
        {{-- <li><a href="/trends"><i class="fa fa-line-chart"></i> <span>Trends</span></a></li> --}}
        <li class="treeview">
          <a href="#"><i class="fa fa-line-chart"></i> <span>Trends</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href = "/programTrends"> <i class="fa fa-line-chart"></i> <span>Programs Trends.</span></a></li>
            <li><a href = "/perspetivesTrends"> <i class="fa fa-line-chart"></i>  <span>Perspectives Trends.</span></a></li>
            <li><a href = "/otherTrends"> <i class="fa fa-line-chart" ></i>  <span> Other Trends Observed.</span></a></li>
          </ul>
        </li>
        <li><a href="/addingNewProramStep0"><i class="fa fa-plus"></i> <span>Add New Program</span></a></li>
        <li><a href="/assesmentCalender"><i class="fa fa-calendar-plus-o"></i> <span> Assessing Calender</span></a></li>
        <li><a href="/viewingAssesors"><i class="fa fa-users"></i> <span> Program Assessors.</span></a></li>
        <li> <a href="/adminReports"> <i class="fa fa-book"></i> <span> All Downloaded Reports.</span> </a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-warning""></i> <span>Non Cnformities</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/nonConformitiesAdmin/0/0"> <i class="fa fa-warning text-green"></i> <span>Closed Non-Conformities</span></a></li>
            <li><a href="/nonConformitiesAdmin/1/0"> <i class="fa fa-warning text-blue"></i>  <span>Non-Conformities In Progress</span></a></li>
            <li><a href="/nonConformitiesAdmin/2/0"> <i class="fa fa-warning text-red" ></i>  <span>Non-Conformities Overdue</span></a></li>
          </ul>
          
        </li>
        <br>
        <li class="header" style="color:white;font-decoration:bold;">PROGRAMS.</li> 
        <br>

        @foreach ($programs as $program)
        <li class="treeview">
            <a href="#"><i class="fa  fa-trophy"></i> <span>{{$program->shortHand}}</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              {{-- <li><a href="#"><i class="fa fa-line-chart"></i> <span> Trends.</span></a></li> --}}

              <li class="treeview">
                <a href="#"><i class="fa fa-line-chart"></i> <span>Trends</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href = "/adminProgramProgress/{{$program->id}}"> <i class="fa fa-line-chart"></i> <span>{{$program->shortHand}} Trends.</span></a></li>
                  <li><a href = "/adminProgramPerspective/{{$program->id}}"> <i class="fa fa-line-chart"></i>  <span>{{$program->shortHand}} Perpective Trends.</span></a></li>
                  {{-- <li><a href = "/otherTrends"> <i class="fa fa-line-chart" ></i>  <span> Other Trends Observed.</span></a></li> --}}
                </ul>
              </li>

              <li><a href="{{"/programDetails/".$program->id}}"><i class="fa fa-th-list"></i>{{$program->shortHand}} Details.</a></li>
              <li><a href="{{"/programMatrices/".$program->id}}"><i class="fa fa-edit"></i>{{$program->shortHand}} Matrices</a></li>
              <li><a href="{{"/scores/".$program->id}}"><i class="fa fa-percent"></i>{{$program->shortHand}} Scores</a></li>
              <li><a href="{{"/programDashboard/".$program->id}}"><i class="fa fa-dashboard"></i> {{$program->shortHand}} Current Dashboard.</a></li>
            </ul>
          </li>
        @endforeach        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section> --}}

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

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
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
<script src="{{asset('js/addingPerspectives.js')}}"></script>
<script src="{{asset('js/deletingPerspetive.js')}}"></script>
<script src="{{asset('js/submittingDeletingPerspectives.js')}}"></script>
<script src="{{asset('js/editingPerspective.js')}}"></script>
<script src="{{asset('js/addingNewPerpsectives.js')}}"></script>
<script src="{{asset('js/validatingTheYear.js')}}"></script>
<script src="{{asset('js/editingStrategicObjective.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@include('sweetalert::alert')
@yield('charts')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     
</body>
</html>
