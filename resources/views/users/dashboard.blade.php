@extends('extendingCode.usersExtending')
@section('navigationBar')

<li>
    <a href="/home">
      <i class="fa fa-address-card"></i>
    </a>
</li> 


<li>            
    <a href="{{"#"}}">
      <i class="fa fa-dashboard"></i>              
    </a>
  </li> 
  <li>            
    <a href="{{"/nonconformities/".$id."/1"}}" data-toggle="tooltip" title=" Non-conformities out of date">
      {{-- <i class="fa fa-bell-o" style="color:#F39C12;"></i>             --}}
      <i class="fa fa-bell" style="color:rgb(255,0,0);"></i>
    </a>
  </li>    
  {{-- checking all the non conformities that are both to be implemented and also out of date. --}}

  <li>            
      <a href="{{"/nonconformities/".$id."/0"}}" data-toggle="tooltip" title="All Non Conformities.">
        {{-- <i class="fa fa-flag-o" style="color:red;"></i>               --}}
        <i class="fa fa-flag" style="color:rgb(255,215,6);"></i>
      </a>
    </li>
@endsection

@section('charts')
{!! $chart->script() !!}
@for ($i = 0; $i < count($charts); $i++)
{!! $charts[$i]->script() !!}
@endfor
@endsection

@section('section')
<div class="col-md-8">
    <div class="box box-danger">
        <div class="box-header with-border text-center" >
          <h3 class="box-title">FINAL SCORES. <span style="font-size:33px: color:black;"><b>{{$finalScore}}</b></span></h3>
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
              <a href=""> <i class="fa fa-download"></i> Download Report Card.</a>   

          @elseif (count($kpiNotScoredNames) == count($allKpis))
          <h3 style="text-align:center;"> <b>NO KPI HAS BEEN ASSESSED</b></h3>
          <h3 style="text-align:center;"> <a href="/home">CLICK ME</a> TO MOVE TO SCORECARD FOR ASSESMENT.</h3>
        @else
          <h4 style="text-align:center;"> <b>The Fllowing KPIs Have Not Been Assessed.</b></h4>
          @for ($i = 0; $i < count($kpiNotScoredNames); $i++)
              <p>{{$kpiNotScoredNames[$i]}}</p>
              <p></p>
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
            {{$name}}
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