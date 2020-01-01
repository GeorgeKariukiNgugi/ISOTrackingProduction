@extends('extendingCode.adminExtending')
@section('charts')
{!!$groupedBarChartForProgramProgress->script()!!}
@endsection
@section('section')

    {{-- <p>This is the progam trends blade template.</p> --}}
    <h1 style="font-size:42px; font-family:'Times New Roman', Times, serif;text-align:center;text-decoration:underline;color:#539AC2"> <i class="fa fa-line-chart"></i> <b>CURRENT YEAR PROGRAM QUATERLY TRENDS.</b>  </h1>
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h2 style="font-family:'Times New Roman', Times, serif;text-align:center;"> 1.) This Grouped BarChart is a graphical representation of the program perfomance per quater in the current year. </h2>
          <br>
          
          <div class="box box-danger">
              <div class="box-header with-border text-center" >
                <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">CURRENT YEAR PROGRAM QUATERLY TRENDS.</span></h3>
              </div>
              <p style="color:red;font-size:13px;font-style:italic;"> <span> <b>Disclaimer</b> If The Bars are at 1% then the proram has not been assesed for that quater.(grouped by program.) </span> </p>
              <div class="box-body">
                
                      {!! $groupedBarChartForProgramProgress->container() !!}
              </div>
              <!-- /.box-body -->
            </div>
      </div> 

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h2 style="font-family:'Times New Roman', Times, serif;text-align:center;"> 2.) This Grouped BarChart is a graphical representation of the program perfomance per quater in the current year. (grouped per quater.) </h2>
          <br>
          
          <div class="box box-danger">
              <div class="box-header with-border text-center" >
                <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">CURRENT YEAR PROGRAM QUATERLY TRENDS.</span></h3>
              </div>
              <p style="color:red;font-size:13px;font-style:italic;"> <span> <b>Disclaimer</b> If The Bars are at 1% then the proram has not been assesed for that quater. </span> </p>
              <div class="box-body">
                
                      {{-- {!! $groupedBarChartForProgramProgress->container() !!} --}}
              </div>
              <!-- /.box-body -->
            </div>
      </div> 


@endsection
