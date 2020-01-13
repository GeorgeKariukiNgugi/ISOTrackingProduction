@extends('extendingCode.adminExtending')
@section('charts')

{!! $groupedBarChartForPerspectiveProgress->script() !!}
{!! $groupedBarChartForPerspectiveProgressPerquater->script() !!}
{!!$groupedBarChartForPerspectiveProgressProgramQuater->script()!!}
{!!$groupedLineChartForPerspectiveProgressPerquater->script()!!}


@endsection
@section('section')

<h1 style="font-size:30px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;text-align:center;text-decoration:underline;"> <i class="fa fa-line-chart"></i> <b><b> {{$year.'   '.$quater}} </b> PERSPECTIVE QUATERLY TRENDS.</b>  </h1>
    <div class="row" id="groupByProgram">
    <div class="col-md-10 col-md-offset-1">
      <h3 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;text-align:center;"> Program perfomance BarChart.</h2>
      <br>
      
      <div class="box box-danger">
          <div class="box-header with-border text-center" >
            <h3 class="box-title"> <span style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif"> {{$year.'   '.$quater.'   '}}PERSPECTIVE TRENDS.</span></h3>
          </div>
          <p style="color:red;font-size:13px;font-style:italic;"> <span> <b></b> If The Bars are at 1% , perspective not assesed </span> </p>
          <div class="box-body">
            
                  {!! $groupedBarChartForPerspectiveProgress->container() !!}

          </div>
          <!-- /.box-body -->
        </div>
  </div> 
</div>
<div class="row" id="groupByquater">
    <div class="col-md-10 col-md-offset-1">
      <h2 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;text-align:center;"> Quaterly perspectives perfomance BarChart.</h2>
      <br>
      
      <div class="box box-danger">
          <div class="box-header with-border text-center" >
            <h3 class="box-title"> <span style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">CURRENT YEAR PROGRAM QUATERLY TRENDS.</span></h3>
          </div>
          <p style="color:red;font-size:13px;font-style:italic;"> <span> <b> If The Bars are at 1% , program not assesed </b></span> </p>
          <div class="box-body">
            
                  {!! $groupedBarChartForPerspectiveProgressPerquater->container() !!}

          </div>
          <!-- /.box-body -->
        </div>
  </div> 
  </div>

  <div class="row" id="groupByquater">
    <div class="col-md-10 col-md-offset-1">
      <h2 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;text-align:center;"> Quaterly Comparison of Perspectives BarChart.</h2>
      <br>
      
      <div class="box box-danger">
          <div class="box-header with-border text-center" >
            <h3 class="box-title"> <span style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">CURRENT YEAR PERSPECTIVE QUATERLY TRENDS.</span></h3>
          </div>
          <p style="color:red;font-size:13px;font-style:italic;"> <span> <b>If The Bars are at 1% , program not assesed.</b>  </span> </p>
          <div class="box-body">
            
                  {!! $groupedBarChartForPerspectiveProgressProgramQuater->container() !!}

          </div>
          <!-- /.box-body -->
        </div>
  </div> 
  </div>

  <div class="row" id="groupByquater">
    <div class="col-md-10 col-md-offset-1">
      <h2 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;text-align:center;"> Quaterly Perspective Perfomance LineGraph.</h2>
      <br>
      
      <div class="box box-danger">
          <div class="box-header with-border text-center" >
            <h3 class="box-title"> <span style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">CURRENT YEAR PERSPECTIVE QUATERLY TRENDS.</span></h3>
          </div>
          <p style="color:red;font-size:13px;font-style:italic;"> <span> <b></b> If The Lines are at 1% , program not assesed  </span> </p>
          <div class="box-body">
            
                  {!! $groupedLineChartForPerspectiveProgressPerquater->container() !!}

          </div>
          <!-- /.box-body -->
        </div>
  </div> 
  </div>
  
@endsection