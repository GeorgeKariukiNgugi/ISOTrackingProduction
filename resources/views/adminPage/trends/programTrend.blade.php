@extends('extendingCode.adminExtending')
@section('charts')
{!!$groupedBarChartForProgramProgress->script()!!}
{!! $groupedBarChartForProgramProgressQuaterly->script() !!}
{!! $groupedLineGraph->script() !!}
@endsection
@section('section')

    {{-- <p>This is the progam trends blade template.</p> --}}
    <h1 style="font-size:30px;font-family:'Times New Roman', Times, serif;text-align:center;text-decoration:underline;"> <i class="fa fa-line-chart"></i> <b><b> {{$year}} </b> PROGRAM QUATERLY TRENDS.</b>  </h1>
        <div class="row" id="groupByProgram">
        <div class="col-md-10 col-md-offset-1">
          <h2 style="font-family:'Times New Roman', Times, serif;text-align:center;"> Quaterly Comparison Of Program Perfomace.</h2>
          <br>
          
          <div class="box box-danger">
              <div class="box-header with-border text-center" >
                <h2 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">CURRENT YEAR PROGRAM QUATERLY TRENDS.</span></h2>
              </div>
              <p style="color:red;font-size:13px;font-style:italic;"> <span> <b>Disclaimer</b> If The Bars are at 1% then the proram has not been assesed for that quater.</span> </p>
              <div class="box-body">
                
                      {!! $groupedBarChartForProgramProgress->container() !!}
              </div>
              <!-- /.box-body -->
            </div>
      </div> 
    </div>
      <div class="row" id="groupByquater">
        <div class="col-md-10 col-md-offset-1">
          <h2 style="font-family:'Times New Roman', Times, serif;text-align:center;"> Program Perfomance BarChart.</h2>
          <br>
          
          <div class="box box-danger">
              <div class="box-header with-border text-center" >
                <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">CURRENT YEAR PROGRAM QUATERLY TRENDS.</span></h3>
              </div>
              <p style="color:red;font-size:13px;font-style:italic;"> <span> <b>Disclaimer</b> If The Bars are at 1% then the proram has not been assesed for that quater. </span> </p>
              <div class="box-body">
                
                      {!! $groupedBarChartForProgramProgressQuaterly->container() !!}
              </div>
              <!-- /.box-body -->
            </div>
      </div> 
      </div>

      <div class="row" id="lineGraphs">
        <div class="col-md-10 col-md-offset-1">
          <h2 style="font-family:'Times New Roman', Times, serif;text-align:center;"> Program Perfomance LineGraph.</h2>
          <br>
          
          <div class="box box-danger">
              <div class="box-header with-border text-center" >
                <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">CURRENT YEAR PROGRAM QUATERLY TRENDS.</span></h3>
              </div>
              <p style="color:red;font-size:13px;font-style:italic;"> <span> <b>Disclaimer</b> If The line graph is at 1% then the proram has not been assesed for that quater. </span> </p>
              <div class="box-body">
                
                      {!! $groupedLineGraph->container() !!}
              </div>
              <!-- /.box-body -->
            </div>
      </div> 
      </div>


@endsection
