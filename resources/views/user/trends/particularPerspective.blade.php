@extends('extendingCode.usersExtending')
@section('navigationBar')

@section('navigationBar')

<li>
    <a href="/home">
      <i class="fa fa-address-card"></i>
    </a>
</li> 


<li>            
    <a href="{{"/dashBoard/".$id}}" ata-toggle="tooltip" title="DashBoard.">
      <i class="fa fa-dashboard"></i>              
    </a>
  </li> 
@endsection
@section('trends')
<a href="{{"/programManager/".$id}}"><i class="fa fa-line-chart"></i> <span>Program Trends.</span></a>
@endsection
@section('perspectiveTrends')
<a href="{{"/programManagerPerspective/".$id}}"><i class="fa fa-line-chart"></i> <span>Perspective Trends.</span></a>
@endsection
@section('overdue')
<a href="{{"/nonconformities/".$id."/1"}}" data-toggle="tooltip" title=" Non-conformities out of date">
@endsection

@section('inProgress')
<a href="{{"/nonconformities/".$id."/0"}}" data-toggle="tooltip" title="Non Conformies In Proress.">
@endsection

@section('closed')
<a href="{{"/nonconformities/".$id."/2"}}" data-toggle="tooltip" title="Closed Non Confrmities.">
@endsection

@section('video')
<a href="{{"/usersTutorial/".$id}}"><i class="fa fa-video-camera"></i> <span>Video Sample</span></a>
@endsection

@section('reports')
<a href="{{"/reports/".$id}}"><i class="fa fa-book"></i> <span> Reports</span></a>

@endsection
@include('Generaltrends.perspectiveInclude')