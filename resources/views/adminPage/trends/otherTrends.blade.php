@extends('extendingCode.adminExtending')
@section('charts')

@foreach ($dougnutNames as $dougnutName)
    {!!$dougnutName->script()!!}
@endforeach

@endsection
@section('section')

    @php
        $start = 0;
        $perspective = 1;
    @endphp
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <h2 style="font-family:'Times New Roman', Times, serif;text-align:center;"> 1.) These Charts give a graphical representation of the program contribution to the overall perfomance of the perspectve for  <b>{{$year.'   '.$quater}}</b></h2>
      </div>
    </div>
   
    <div class="row" id="groupByProgram">
    @foreach ($dougnutNames as $dougnutName)
    
      @php
            switch ($perspective) {
      case 1:
          # code...
          $nameOfDoughnutChart = 'Financial Perspetive';
          break;
          case 2:
              $nameOfDoughnutChart = 'Customer Perspetive';
          break;
          case 3: 
              $nameOfDoughnutChart = 'Inernel Business Perspective';
          break;
          case 4:  
              $nameOfDoughnutChart = 'Learning And Growth Perspetive';
          break;

      default:
          # code...
          $nameOfDoughnutChart = 'Not Known';
          break;
  }  
      @endphp


    
        <div class="col-md-6">
         
          <br>
          
          <div class="box box-danger">
              <div class="box-header with-border text-center" >
                {{-- <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif"> {{$year.'   '.$quater.'   '}}PERSPECTIVE TRENDS.</span></h3> --}}
                <h3 class="box-title"> <span style="font-size:28px;font-family:Georgia, 'Times New Roman', Times, serif">{{ strtoupper($nameOfDoughnutChart) .'  '}}</span> <span><b style="font-size:28px;font-family:Verdana, Geneva, Tahoma, sans-serif">{{ sprintf("%.2f", $average[$start])."%"}}</b></span></h3>
              </div>
              <p style="color:red;font-size:13px;font-style:italic;"> <span> <b>Disclaimer</b> If The Sectors are less than 1% then the perspective has not been assesed for that quater.</span> </p>

              @php
                  //! this section of the code is used to et the general scores that are in the form of numbers. 
                  $scoresInPercentageIndex = $scoresInPercentages[$start];
                  $scoresInPercentagesNamesIndex = $scoresInPercentagesNames[$start];

                  // dd($scoresInPercentageIndex);


              @endphp
              <p style="text-align:center;">
              @for ($i = 0; $i < count($scoresInPercentageIndex); $i++)

                  <span style="font-style:bold;">  <span style="color:darkblue;">{{$scoresInPercentagesNamesIndex[$i]}}</span> :: <span style="color:darkred;"> <b>{{round($scoresInPercentageIndex[$i],2)}}</b></span> </span>
                  {{-- {{$scoresInPercentagesNamesIndex[$i] . '  '. round($scoresInPercentageIndex[$i],2)}}                   --}}
                  
              @endfor
            </p>
              <div class="box-body">
                
                {!!$dougnutName->container()!!}
    
              </div>
              <!-- /.box-body -->
            </div>
      </div> 

      @php
      $perspective++;
      $start++;
      @endphp

@endforeach  
</div>  
    

@endsection

{{-- {!!$dougnutNames!!} --}}