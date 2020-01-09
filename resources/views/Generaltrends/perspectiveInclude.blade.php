@section('charts')

{{-- {!! $groupedBarChartForPerspectiveProgress->script() !!} --}}
{!! $groupedBarChartForPerspectiveProgressPerquater->script() !!}
{{-- {!!$groupedBarChartForPerspectiveProgressProgramQuater->script()!!} --}}
{!!$groupedLineChartForPerspectiveProgressPerquater->script()!!}


@endsection
@section('section')
<h1 style="font-size:30px; font-family:'Times New Roman', Times, serif;text-align:center;text-decoration:underline;color:#539AC2"> <b><b> {{$programName}}</b>  </h1>
<h1 style="font-size:30px; font-family:'Times New Roman', Times, serif;text-align:center;text-decoration:underline;color:#539AC2"> <i class="fa fa-line-chart"></i> <b><b> {{$year.'   '.$quater}} </b> PERSPECTIVE QUATERLY TRENDS.</b>  </h1>
    
<div class="col-md-8 col-md-offset-2" >
  {{-- <h2 style="font-family:'Times New Roman', Times, serif;color:darkblue;text-align:center;">{{$programName}}</h2> --}}
    <h2 style="font-family:'Times New Roman', Times, serif;color:darkblue;text-align:center;">This tab has 3 graphical representations of the the perspective trends for <b> {{$year.'   '.$quater}} </b> Financial year.</h2>
    <br>
    <ol>
        {{-- <a href="#groupByProgram"> <h4  style="font-family:'Times New Roman', Times, serif;color:darkblue;"> 1.) A grouped BarChart that shows the current quater perspective trend but grouped by programs <span style="font-style:italic;color:red;">(click to view.)</span> </h4> </a></li>         --}}
        <a href="#groupByquater"> <h4 style="font-family:'Times New Roman', Times, serif;color:darkblue;"> 1.)  A grouped BarChart that shows the current quater perspective trend but grouped by quaters <span style="font-style:italic;color:red;">(click to view.)</span></h4> </a>              
        <a href="#lineGraphs"> <h4 style="font-family:'Times New Roman', Times, serif;color:darkblue;"> 2.) A grouped LineGraph that shows the current quater perspective trend in  quaterly Fashion. <span style="font-style:italic;color:red;">(click to view.)</span></h4> </a>       
    </ol>
    <br>
    <br>
</div>


<div class="row" id="groupByquater">
    <div class="col-md-10 col-md-offset-1">
      <h2 style="font-family:'Times New Roman', Times, serif;text-align:center;"> 1.) This Grouped BarChart is a graphical representation of the perspectives perfomance per quater in the current year. (grouped per quater.) </h2>
      <br>
      
      <div class="box box-danger">
          <div class="box-header with-border text-center" >
            <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">CURRENT YEAR PROGRAM QUATERLY TRENDS.</span></h3>
          </div>
          <p style="color:red;font-size:13px;font-style:italic;"> <span> <b>Disclaimer</b> If The Bars are at 1% or 0% then the proram has not been assesed for that quater. </span> </p>
          <div class="box-body">
            
                  {!! $groupedBarChartForPerspectiveProgressPerquater->container() !!}

          </div>
          <!-- /.box-body -->
        </div>
  </div> 
  </div>

  <div class="row" id="lineGraphs">
    <div class="col-md-10 col-md-offset-1">
      <h2 style="font-family:'Times New Roman', Times, serif;text-align:center;"> 2.) This Grouped LineChart is a graphical representation of the perspectives perfomance per quater in the current year. (grouped per proram.) </h2>
      <br>
      
      <div class="box box-danger">
          <div class="box-header with-border text-center" >
            <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">CURRENT YEAR PERSPECTIVE QUATERLY TRENDS.</span></h3>
          </div>
          <p style="color:red;font-size:13px;font-style:italic;"> <span> <b>Disclaimer</b> If The lines are at 1% or 0% then the proram has not been assesed for that quater. </span> </p>
          <div class="box-body">
            
                  {!! $groupedLineChartForPerspectiveProgressPerquater->container() !!}

          </div>
          <!-- /.box-body -->
        </div>
  </div> 
  </div>
  
@endsection