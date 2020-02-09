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
<body>

    <h3>Kinly close this Issues.</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            
            <tbody>
                
            @foreach ($nonConformities as $nonConformitiess)

            
            <tr>
                <th>Reason</th> <td>{{$nonConformitiess->rootCause}}</td>
                
            </tr> 
            <tr>
                <th>Correction</th> <td>{{$nonConformitiess->correction}}</td>
            </tr>
            <tr>
                <th>correctiveAction</th><td>{{$nonConformitiess->correctiveAction}}</td>
            </tr>            

            @endforeach
   
            </tbody>
        </table>
    </div>
		@component('mail::table')
 
		@endcomponent    
</body>
</html>
