{{-- @extends('errors::minimal')

@section('title', __('Oooooooppppsss, An Error Has Occured, Kindly Inform The Administrator'))
@section('code', '500')
@section('message', __('Oooooooppppsss, An Error Has Occured, Kindly Inform The Administrator.')) --}}

{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}
<html><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('AdminLTE-master\bower_components\bootstrap/dist\css\bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('AdminLTE-master\bower_components\font-awesome\css\font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('AdminLTE-master\bower_components\Ionicons\css\ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('AdminLTE-master\dist\css\AdminLTE.min.css')}}">

    <link rel="stylesheet" href="{{asset('AdminLTE-master\dist\css\skins\skin-green.min.css')}}">
  

  
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition login-page" >
  <div class="login-box">
    <div class="login-logo" style="text-align:center;">
      {{-- <a href="../../index2.html"><b>Admin</b>LTE</a> --}}
      
      <img src="{{asset('images/HcMgk6Jq_400x400.jpg')}}" class="user-image img-circle img-reponsive" width="100px" height="100px" alt="User Image">
      <h3 style="font-family:'Times New Roman', Times, serif;">Safaricom ISO ScoreCard.</h3>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg" style="color:red;"> <b>'Oooooooppppsss, An Error Has Occured, Kindly Inform The Administrator.'</b> </p>
      <P style="margin-top:0%;text-align:center;color:green"> <b>500</b></p>
      <p class="login-box-msg" style="color:blue;"> <b>   Kindly Contact The Admin For Directions. </b> </p>
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <a  href = "{{action('errorAndNoPageError@noPage')}}" class="btn btn-block btn-info btn-flat">  GO BACK.</a>
        </div>
    </div>  
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  
  <!-- jQuery 3 -->
  <script src="{{asset('AdminLTE-master/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('AdminLTE-master/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{asset('AdminLTE-master/plugins/iCheck/icheck.min.js')}}"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
  
  
  </body></html>


