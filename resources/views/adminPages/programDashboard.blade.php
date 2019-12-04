@extends('extendingCode.adminExtending')
@section('section')
@section('charts')
{!! $chart->script() !!}
@for ($i = 0; $i < count($charts); $i++)
{!! $charts[$i]->script() !!}
@endfor
@endsection

@section('section')

<h1 style="font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;"> {{$programDetailsArray[0]}}</h1>
<h1 style="font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;"> {{ $programDetailsArray[1]}}</h1>
<h1 style="font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;"> {{  $activeYaer . ' '. $activeQuater. 'DashBoard.' }}</h1>
<div class="col-md-8">
    <div class="box box-danger">
        <div class="box-header with-border text-center" >
          <h3 class="box-title"> <span style="font-size:40px;font-family:Georgia, 'Times New Roman', Times, serif">CUMMULATIVE FINAL SCORES::</span> <span><b style="font-size:40px;font-family:Verdana, Geneva, Tahoma, sans-serif">{{ sprintf("%.2f", $finalScore)."%"}}</b></span></h3>
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
          <h3 class="box-title"> Non Assesed KPIS.</h3>
        </div>
        <div class="box-body">
          @if (count($kpiNotScoredNames) == 0)
          <h3>ALL KPIs HAVE BEEN ASSESSED.</h3>
              <a href="{{"/samplePDF/".$id}}"> <i class="fa fa-download"></i> Download Report Card.</a>   

          @elseif (count($kpiNotScoredNames) == count($allKpis))
          <h3 style="text-align:center;"> <b>NO KPI HAS BEEN ASSESSED FOR {{$activeQuater}} Quater {{$activeYaer}}</b> </h3>
          {{-- <h3 style="text-align:center;"> <a href="/home">CLICK ME</a> TO MOVE TO SCORECARD FOR ASSESMENT.</h3> --}}
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

@endsection