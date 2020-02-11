@extends('extendingCode.usersExtending')
@section('navigationBar')

<li>
    <a href="{{"/home/".$id}}">
      <i class="fa fa-address-card text-yellow"></i>
      Home 
    </a>
</li> 


<li>            
    <a href="{{"#"}}">
      <i class="fa fa-dashboard text-yellow"></i>
      Dashboard
    </a>
  </li> 
@endsection
@section('logoRedirect')
<a href={{"/home/".$id}} class="logo"> 
@endsection
@section('trends')
<a href="{{"/programManager/".$id}}"><i class="fa fa-line-chart"></i> <span>Program Trends.</span></a>
@endsection

@section('perspectiveTrends')
<a href="{{"/programManagerPerspective/".$id}}"><i class="fa fa-line-chart"></i> <span>Perspective Trends.</span></a>
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
    <li><a href="/usersTutorial/{{$id}}/2"><i class="fa fa-video-camera"></i> <span>Closing Non-Conformities</span></a></li>
    <li><a href="/usersTutorial/{{$id}}/3"><i class="fa fa-video-camera"></i> <span>Program Dashboard.</span></a></li>
  </ul>
</li>
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

@section('charts')
{!! $chart->script() !!}
@for ($i = 0; $i < count($charts); $i++)
{!! $charts[$i]->script() !!}
@endfor
@endsection
@section('reports')
<a href="{{"/reports/".$id}}"><i class="fa fa-book"></i> <span>Downloaded Reports</span></a>

@endsection

@if ($valueOfEditing == 1)
@section('userEditingMatrices')
<li>
  <a href="{{"/userMatrices/".$id}}"><i class="fa fa-edit"></i> <span> Editing Matrices.</span></a>
</li>
@endsection

@endif

@section('section')

{{-- <h1 style="font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;"> {{$programDetailsArray[0]}}</h1> --}}
{{-- <h1 style="font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;"> {{ $programDetailsArray[1]}}</h1> --}}
<h1 style="font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;"> {{  $activeYaer . '   '. $activeQuater. '   DashBoard.' }}</h1>
<div class="col-md-8">
    <div class="box box-danger">
        <div class="box-header with-border text-center" >
          <h3 class="box-title"> <span style="font-size:28px;font-family:Georgia, 'Times New Roman', Times, serif">CUMMULATIVE FINAL SCORES::</span> <span><b style="font-size:40px;font-family:Verdana, Geneva, Tahoma, sans-serif">{{ sprintf("%.2f", $finalScore)."%"}}</b></span></h3>
        </div>
        <div class="box-body">
                {!! $chart->container() !!}
        </div>
        <!-- /.box-body -->
      </div>
</div>
<div class="col-md-4">
    <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title"> Non Assessed KPIS.</h3>
        </div>
        <div class="box-body">
          @if (count($kpiNotScoredNames) == 0)
          <h3>ALL KPIs HAVE BEEN ASSESSED.</h3>
              <a href="{{"/samplePDF/".$id}}"> <i class="fa fa-download"></i> Download Report Card.</a>   

          @elseif (count($kpiNotScoredNames) == count($allKpis))
          <h3 style="text-align:center;"> <b>NO KPI HAS BEEN ASSESSED FOR {{$activeQuater}} Quater {{$activeYaer}}</b> </h3>
          <h3 style="text-align:center;"> <a href="{{"/home/".$id}}">CLICK ME</a> TO MOVE TO SCORECARD FOR ASSESMENT.</h3>
        @else
          <h4 style="text-align:center;"> <b>{{count($kpiNotScoredNames) }} KPIs Have Not Been Assessed For {{$activeQuater}} Quater {{$activeYaer}}</b></h4>
          @for ($i = 0; $i < count($kpiNotScoredNames); $i++)
              <p>{{$i+1 .'.   '.  $kpiNotScoredNames[$i]}}</p>
              
          @endfor

          @endif
        </div>
        <!-- /.box-body -->
      </div>
</div>
    @for ($i = 0; $i < count($charts); $i++)
        <div class="col-md-6">
    <div class="box box-solid">
      <div class="box-header with-border text-center" >
        <i class="fa fa-text-width"></i>

        <h3 class="box-title text-center">
            @php
                 $name = str_replace('_', ' ', $proramPersspectives[$i]->name);
                 $name = ucwords($name);
            @endphp
            <b style="color:blue;">{{$name}}</b>
        </h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        {!! $charts[$i]->container() !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
    @endfor
@endsection