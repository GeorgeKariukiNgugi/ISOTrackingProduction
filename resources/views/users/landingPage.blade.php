@extends('extendingCode.usersExtending')
@section('navigationBar')
<li>            
    <a href="/">
      <i class="fa fa-dashboard"></i>              
    </a>
  </li>  
  <li>            
      <a href="/" data-toggle="tooltip" title=" Non-conformities out of date">
        <i class="fa fa-bell-o" style="color:#F39C12;"></i>              
      </a>
    </li> 
    <li>            
        <a href="/" data-toggle="tooltip" title="All Non Conformities.">
          <i class="fa fa-flag-o" style="color:red;"></i>              
        </a>
      </li>
@endsection
@section('section')
@php
    $increment2 = 0;
@endphp
@php   
    $name = str_replace('_', ' ', $programName);
    $name = ucwords($name);
@endphp

@php
    //getting to know the length of the shorthand of the progrm        
        $shorthandLength = strlen($programShortHand)+1;
@endphp
<div style="margin-bottom:5%;margin-top:5%"id="heading">
<h1 class="text-center" style="font-family:Times New Roman;">Welcome To Safaricom {{$name}}</h1>
    <h1 class="text-center" style="font-family:Times New Roman;">({{$programShortHand}})</h1>
    <h2 class="text-center" style="font-family:Times New Roman;">Update the quaterly Scores based on the perspectives that have been listed below :-</h2>
</div>
    
<div class="panel-group" id="accordion" role="tablist">  
@foreach ($perspectives as $perspective)
    
    {{-- getting the name of the particular perspective. --}}

    @php
        $name2 = $perspective->name;
        $nameOfPerspective = substr($name2,$shorthandLength);
        $name2 = str_replace('_', ' ', $nameOfPerspective);
        $name2 = ucwords($name2);
        $increment2++;               
    @endphp

<div class="panel box box-warning box-solid">
  <div class="box-header with-border">
    <h4 class="box-title" style="width:100%;">
      <a data-toggle="collapse" style="padding-right:10px;" data-parent="#accordion" href="{{"#collapseOne".$increment2}}" aria-expanded="true" aria-controls="collapseOne">
        {{$name2}} <i style = "float:right;"class="accordion_icon fa fa-plus"></i>
      </a>
    </h4>
  </div>
  <div id="{{"collapseOne".$increment2}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
    <div class="panel-body">
      
      {{-- getting the strategic objectives of theperspecives that have been given. --}}

      @php
          $strategicObjectives = $perspective->strategicObjectives;
          $number = count($strategicObjectives);
          if($number < 1){
            echo "there are no strategic objectives for thie perspective.";
          }                  
      @endphp
      @if ($number < 1)
          <p>THERE ARE NO STRATEGIC OBJECTIVES FOR THIS PERSPECTIVE.</p>
      @endif
      @if ($number > 0)
          
          @foreach ($strategicObjectives as $strategicObjective)
          {{-- cleaning the data that is in the strategic objective for better visualisation. --}}
          @php
              $perspetiveName= str_replace('_', ' ', $strategicObjective->name);
              $perspetiveName = ucwords($perspetiveName);
          @endphp
          
          <div class="box box-primary box-solid">
            <div class="box-header with-border text-center"style="text-align:center">
            <h3 class="box-title text-center">{{$perspetiveName}}</h3>
            </div>
            {{-- getting the key perfomance indicators for the specific strategic objectives. --}}
            @php
                $kpis = $strategicObjective->keyPerfomanceIndicator;
                $numberOfKPI = count($kpis);
            @endphp
            @if ($numberOfKPI <= 0)
            <div>
                <div class="box-body">
                    <h4 style="text-align:center;">There are no key perfomance indicators for this strategic objective. <b> Click on the add button to add the kpis.</b></h4>
                </div>
              <div class="box-footer clearfix">
                  <div style="text-align:left" class="col-md-6">
                      <a class="btn btn-success btn-md" data-toggle="modal" data-target="{{"#modal".$strategicObjective->name}}"> <b>Add New</b> </a>                  
                  </div>
              </div>
            </div> 
          </div>           
            @else
            <form id = "{{"form".$strategicObjective->name}}" method="POST" name = "{{"form".$strategicObjective->name}}" >
              <div id = "{{"alert".$strategicObjective->name}}"></div>
                               {{-- <input type="hidden" name = "objectiveName" value="{{$objevtiveId}}"> --}}
                               <div class="row">
                                   <div class="col-md-1">
                                       <p class="text-center" style="font-size:16px;"><strong>No</strong></p>
                                   </div>
                                   <div class=" col-md-4 ">
                                       <p  style="font-size:16px;text-align:left;"><strong>Key Perfomance Indicator</strong><br /></p>
                                   </div>
                                   <div class="col-md-1">
                                       <p class="text-center" style="font-size:16px;"><strong>Score</strong><br /></p>
                                   </div>
                                   <div class="col-md-1">
                                       <p class="text-center" style="font-size:16px;"><strong>Target</strong><br /></p>
                                   </div>
                                   <div class="col-md-1">
                                       <p class="text-center" style="font-size:16px;"><strong>Q1</strong><br /></p>
                                   </div>
                                   <div class="col-md-1">
                                       <p class="text-center" style="font-size:16px;"><strong>Q2</strong><br /></p>
                                   </div>
                                   <div class="col-md-1">
                                       <p class="text-center" style="font-size:16px;"><strong>Q3</strong><br /></p>
                                   </div>
                                   <div class="col-md-1">
                                       <p class="text-center" style="font-size:16px;"><strong>Q4</strong><br /></p>
                                   </div>
                                   <div class="col-md-1">
                                       <p class="text-center" style="font-size:16px;"><strong>Target Met ?</strong><br /></p>
                                   </div>
                               </div>
                              
                               @foreach ($kpis as $kpi)

                               @php
                                  //counting the number of returned kpis.                                   
                                   $increment3 = 0;
                               @endphp

                               @php
                               $score = "number";
                               $kpiOriginalName = $kpi->name;
                               $name3 = $kpi->name;
                               $name3 = str_replace('_', ' ', $name3);
                               $name3 = ucwords($name3);
                               $increment3++;
                               $kpiId = $kpi->id;
                               $scoreRecordedNumberReturned = count($scoresRecorded);

                              //!  getting the score of the particular strategic objective.
                               if(is_null($scoresRecorded)){
                                $score = 0;
                                // dd("null");
                               }
                               else{
                                //  dd("not null");
                                if ($scoreRecordedNumberReturned<1) {
                                  # code...
                                  $score = 0;
                                } else {
                                  # code...                                
                                        foreach($scoresRecorded as $scoresRecordeds)
                                      {
                                        $scoreKPI = $scoresRecordeds->key_Perfomance_Indicator_id;
                                        $scoreYear = $scoresRecordeds->year;
                                        if($scoreKPI == $kpiId){
                                            $score = $scoresRecordeds->ytd;
                                        break;
                                        }
                                        else{
                                          $score =0;
                                        }
                                      }
                                }
                               }     
                               //end of getting the score of the key perfomance indicator.
                               @endphp
                                      <div class="row" style="margin-bottom:0.5%;">
                                        {{-- <input type = "hidden" value="{{$originalObjectiveName}}" id = "{{"hiddenKPIObective".$kpiOriginalName}} name = "{{"hiddenObjectiveName".$originalObjectiveName}}"/> --}}
                                        <div class=" col-md-1"style="text-align:center">
                                            <p>{{$kpi->id}}</p>
                                        </div>
                                        <div class=" col-md-4" style="text-align:left">
                                            <p>{{$name3}}</p>
                                        </div>
                                        <div class=" col-md-1" style="text-align:center"><p>{{$score}}</p></div>
                                        <div class=" col-md-1"style="text-align:center">
                                            <p id = "{{"target".$kpiOriginalName}}" class ="{{"target".$kpiOriginalName}}" >{{$kpi->target}}</p>
                                        </div>
                                        <div class=" col-md-1"><input   type = "number" step=".01" required id = "{{"Quater1".$kpiOriginalName}}"class="form-control {{"Quater1".$kpiOriginalName}}" /></div>
                                        <div class=" col-md-1"><input   type = "number" step=".01"  id = "{{"Quater2".$kpiOriginalName}}" readonly placeholder="Inactive" class="form-control {{"Quater2".$kpiOriginalName}}" /></div>
                                        <div class=" col-md-1"><input   type = "number" step=".01"  id = "{{"Quater3".$kpiOriginalName}}" readonly placeholder="Inactive" class="form-control {{"Quater3".$kpiOriginalName}}" /></div>
                                        <div class=" col-md-1"><input   type = "number" step=".01"  id = "{{"Quater4".$kpiOriginalName}}" readonly placeholder="Inactive"class="form-control {{"Quater4".$kpiOriginalName}}" /></div>                                      
                                        {{-- <div class=" col-md-3"><textarea  id="{{"reason".$kpiOriginalName}}"  readonly style="height:35px;">N/A</textarea></div> --}}
                                    </div> 
                               @endforeach
                               <div class="box-footer">   
                                {{-- Adding the Modal That is used to add the Key Perfomance Indicators.  --}}
                                {{-- id="{{ "modal".$originalObjectiveName}} --}}                                                                    
                                <div style="text-align:left" class="col-md-6">
                                  <a class="btn btn-success btn-md" data-toggle="modal" data-target="{{"#modal".$strategicObjective->name}}"> <b>Add New</b> </a>
                                  {{-- <a class="btn btn-warning btn-md" > <b>Edit .</b> </a> --}}
                                </div>
                                <div style="text-align:right;" class="col-md-6">
                                  <button class="btn btn-danger btn-md" type = "submit" id= "{{"submit".$strategicObjective->name}}"> <b>Save</b> </button>
                                </div>
                               </div>
                               {{-- <input type = "hidden" value = "{{$numberOfKPI}}" id="{{$originalObjectiveName."numberOfKPI"}}"> --}}
            </form> 
          </div>
          @endif
          @endforeach

      @endif

    </div>
  </div>
</div>
@endforeach
</div>
<script src="design/assets/js/jquery.min.js"></script>
<script>
  $(document).ready(function(){ 
    $('a').tooltip();
$('.box-title > a').click(function() {
    // console.log("clicked.");
    $(this).find('i').toggleClass('fa-plus fa-minus')
           .closest('.panel').siblings('.panel')
           .find('i')
           .removeClass('fa-minus').addClass('fa-plus');
});   
        });
          
</script>
@endsection