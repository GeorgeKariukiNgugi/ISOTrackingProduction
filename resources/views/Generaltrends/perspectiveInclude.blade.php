@section('charts')

{{-- {!! $groupedBarChartForPerspectiveProgress->script() !!} --}}
{!! $groupedBarChartForPerspectiveProgressPerquater->script() !!}
{{-- {!!$groupedBarChartForPerspectiveProgressProgramQuater->script()!!} --}}
{!!$groupedLineChartForPerspectiveProgressPerquater->script()!!}


@endsection
@section('section')
<h1 style=" text-align:center; font-size:30px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;text-align:
;"> <b><b> {{$year."  Perspective Trends."}}</b>  </h1>
<div class="row" id="groupByquater">
    <div class="col-md-10 col-md-offset-1">
      <h2 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-align:center;">Perspective Trend BarChart</h2>
      <br>
      
      <div class="box box-danger">
          <div class="box-header with-border text-center" >
            <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">CURRENT YEAR PROGRAM QUATERLY TRENDS.</span></h3>
          </div>
          <p style="color:red;font-size:13px;font-style:italic;"> <span> If The Bars are at 1% , program not assessed</p>
          <div class="box-body">
            
                  {!! $groupedBarChartForPerspectiveProgressPerquater->container() !!}

          </div>
          <!-- /.box-body -->
        </div>
  </div> 
  </div>

  <div class="row" id="lineGraphs">
    <div class="col-md-10 col-md-offset-1">
      <h2 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"> 2.) Perspectives Trends Grouped LineChart. (grouped per proram.) </h2>
      <br>
      
      <div class="box box-danger">
          <div class="box-header with-border text-center" >
            <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">CURRENT YEAR PERSPECTIVE QUATERLY TRENDS.</span></h3>
          </div>
          <p style="color:red;font-size:13px;font-style:italic;"> <span> If The Bars are at 1% , program not assessed</p>
          <div class="box-body">
            
                  {!! $groupedLineChartForPerspectiveProgressPerquater->container() !!}

          </div>
          <!-- /.box-body -->
        </div>
  </div> 
  </div>
  
@endsection