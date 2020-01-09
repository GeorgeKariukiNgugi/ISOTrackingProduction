@extends('extendingCode.usersExtending')
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
@section('section')
{{-- <h1 style="font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;"> <i class="fa fa-book"></i>  Downloaded Reports  Tab. </h1> --}}
<div class="col-xs-12" style="margin-top:3%;">
        <div class="box box-solid box-success">
          <div class="box-header " style="text-align:center;">
            <h3 class="box-title" style="font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;">Downloaded Reports.</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                <th>S<sub>no</sub></th>
                <th>Proram</th>
                <th>Year</th>
                <th>Quater</th>
                <th>Report In PDF Format.</th>
              </tr>
@php
    $increment = 0;
@endphp

              @if (count($reports) == 0)
                  <h3 style="text-align:center;font-family:'Times New Roman', Times, serif;color:red"> You Have Not Yet Downloaded Any Reports Kindly Go To The Dashboard And Download If You Have Finished Assesing Your Program For This Quater.</h3>
              @endif
              @foreach ($reports as $report)
              <tr>
              <td>{{$increment}}</td>
              <td>{{$programNamesArray[$increment]}}</td>
              <td>{{$report->year}}</td>
              <td>{{$report->quater}}</td>
              <td> <a href="/{{$report->reportLocation}}"> Click To Download The Report.</a> </td>
            </tr> 

            @php
                $increment++;
            @endphp
              @endforeach
            </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    
@endsection