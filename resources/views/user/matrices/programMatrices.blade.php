@extends('extendingCode.usersExtending')
@section('navigationBar')

@section('navigationBar')

<li>
    <a href="/home">
      <i class="fa fa-address-card text-yellow"></i>
      Home
    </a>
</li> 


<li>            
    <a href="{{"/dashBoard/".$id}}" ata-toggle="tooltip" title="DashBoard.">
      <i class="fa fa-dashboard text-yellow"></i>              
      DashBoard
    </a>
  </li> 
@endsection

@if ($valueOfEditing == 1)
@section('userEditingMatrices')
<li>
  <a href="{{"/userMatrices"}}"><i class="fa fa-edit"></i> <span> Editing Matrices.</span></a>
</li>
@endsection

@endif

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
<li class="treeview">
  <a href="#"><i class="fa fa-video-camera"></i> <span>Video Tutorials</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="/usersTutorial/{{$id}}/1"><i class="fa fa-video-camera"></i> <span>Scoring KPIS</span></a></li>
    <li><a href="/usersTutorial/{{$id}}/2"><i class="fa fa-video-camera"></i> <span>Closing Non-Confromities</span></a></li>
    <li><a href="/usersTutorial/{{$id}}/3"><i class="fa fa-video-camera"></i> <span>Program Dashboard.</span></a></li>
  </ul>
</li>
@endsection

@section('reports')
<a href="{{"/reports/".$id}}"><i class="fa fa-book"></i> <span> Reports</span></a>

@endsection
@include('programMatrices.programMatrices')