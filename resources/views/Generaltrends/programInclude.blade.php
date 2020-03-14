@section('charts')
{{-- {!!$groupedBarChartForProgramProgress->script()!!} --}}
{!! $groupedBarChartForProgramProgressQuaterly->script() !!}
{!! $groupedLineGraph->script() !!}
@endsection
@section('section')
    <h1 style="font-size:30px; text-align:center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"> <b><b> {{$year."  Program Trends."}}</b>  </h1>
      <div class="row" id="groupByquater">
        <div class="col-md-10 col-md-offset-1">
          <h2 style="text-align:center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Program Trend BarChart</h2>
          <br>
          
          <div class="box box-danger">
              <div class="box-header with-border text-center" >
                <h3 class="box-title"> <span style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">CURRENT YEAR PROGRAM QUARTERLY TRENDS.</span></h3>
              </div>
              <p style="color:red;font-size:13px;font-style:italic;"> <span> <b></b> If The Bars are at 1% , program  not assessed </span> </p>
              <div class="box-body">
                
                      {!! $groupedBarChartForProgramProgressQuaterly->container() !!}
              </div>
              <!-- /.box-body -->
            </div>
      </div> 
      </div>

      <div class="row" id="lineGraphs">
        <div class="col-md-10 col-md-offset-1">
          <h2 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;text-align:center;">Program Trend LineGraph</h2>
          <br>
          
          <div class="box box-danger">
              <div class="box-header with-border text-center" >
                <h3 class="box-title"> <span style=" text-align:center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">CURRENT YEAR PROGRAM QUATERLY TRENDS.</span></h3>
              </div>
              <p style="color:red;font-size:13px;font-style:italic;"> <span> <b></b> If The line graph is at 1%, program not assesed </span> </p>
              <div class="box-body">
                
                      {!! $groupedLineGraph->container() !!}
              </div>
              <!-- /.box-body -->
            </div>
      </div> 
      </div>


@endsection
