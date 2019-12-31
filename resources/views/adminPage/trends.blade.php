@extends('extendingCode.adminExtending')
@section('charts')
{!! $trialCharts->script() !!}
{!! $usersChart->script() !!}

{{-- {!! $ncsperProgramCharts->script() !!} --}}

@endsection
@section('section')
<hr>
<h2 style="text-align:center;font-family:'Times New Roman', Times, serif;font-size:42px;color:#72BBE9"> <i class="fa fa-line-chart"></i> TRENDS TAB.</h2>
<hr>
<div class="col-md-4 col-md-offset-4">
  <h3 style="text-align:left;font-family:'Times New Roman', Times, serif;">Trends Table Of Contents.</h3>
  <ol style="text-align:left;font-family:'Times New Roman', Times, serif;">
    <li>
      <a href=""> Line Graph Trends For All Programs.</a>
    </li>
    <li>
      <a href=""> Grouped Bar Chart 2019 Quaterly Trends Per Programs</a>
    </li>
    <li>
      <a href=""> Grouped Bar Chart For </a>
    </li>
  </ol>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-danger">
        <div class="box-header with-border text-center" >
          <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">TRENDS PER PROGRAM PER QUATER PER YEAR.</span></h3>
        </div>
        <div class="box-body">
                {!!$usersChart->container()!!}
        </div>
        <!-- /.box-body -->
      </div>
</div> 
</div>
<div class="row" style="">
  <div class="col-md-10 col-md-offset-1">
    <div class="box box-danger">
        <div class="box-header with-border text-center" >
          <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">TRENDS PER PROGRAM PER QUATER PER YEAR.</span></h3>
        </div>
        <p style="color:red;text-align:center;">This greph is not giving a full picture:</p>
        <div class="box-body">
          
                {!!$trialCharts->container()!!}
        </div>
        <!-- /.box-body -->
      </div>
</div>   
</div>

@endsection