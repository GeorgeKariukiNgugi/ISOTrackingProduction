@extends('extendingCode.usersExtending')
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
@section('reports')
<a href="{{"/reports/".$id}}"><i class="fa fa-book"></i> <span> Reports</span></a>

@endsection
@section('section')

<div class="container">
    <div class="row" style="height:100vh;">
        <div class="col-md-10 col-md-offset-1" style="height:75vh;">

          @if ($type == 1)
          <h3 style="text-align:center;font-family:'Times New Roman', Times, serif;"> SCORING KPIs VIDEO TUTORIAL.</h3>
          <video controls style="width:100%;height:75vh;" src="{{asset('video/scoringKpis.mp4')}}"></video>
          @endif
          @if ($type == 2)
          <h3 style="text-align:center;font-family:'Times New Roman', Times, serif;"> CLOSING NON CONFORMITIES VIDEO TUTORIAL.</h3>
              <video controls style="width:100%;height:75vh;" src="{{asset('video/newClosingNC.mp4')}}"></video>
          @endif
          @if ($type == 3)
          <h3 style="text-align:center;font-family:'Times New Roman', Times, serif;"> DASHBOARD VIDEO TUTORIAL.</h3>
              <video controls style="width:100%;height:75vh;" src="{{asset('video/newDashboard.mp4')}}"></video>
          @endif 
            {{-- <video controls style="width:100%;height:75vh;" src="{{asset('video/userVideo.mp4')}}"></video> --}}
        </div>
    </div>
</div>

@endsection