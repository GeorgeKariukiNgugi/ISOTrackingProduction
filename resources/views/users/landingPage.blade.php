@extends('extendingCode.usersExtending')
@section('navigationBar')
<li>
    <a href="/home">
      <i class="fa fa-address-card"></i>
    </a>
</li> 


<li>            
    <a href="/">
      <i class="fa fa-dashboard"></i>              
    </a>
  </li> 
  
  {{-- kindly check the number of non Conformities that are out of date. --}}
  
  <li >            
      <a href="/" data-toggle="tooltip" title=" Non-conformities out of date">
        {{-- <i class="fa fa-bell-o" style="color:#F39C12;"></i>             --}}
        <i class="fa fa-bell" style="color:rgb(255,215,6);"></i>
      </a>
    </li>    
    {{-- checking all the non conformities that are both to be implemented and also out of date. --}}

    <li>            
        <a href="/" data-toggle="tooltip" title="All Non Conformities.">
          {{-- <i class="fa fa-flag-o" style="color:red;"></i>               --}}
          <i class="fa fa-flag" style="color:rgb(255,0,0);"></i>
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
<h1 class="text-center" style="font-family:Times New Roman;">Welcome To Safaricom {{$name}} Score Card.</h1>
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
            <form id = "{{"form".$strategicObjective->id}}" method="POST" name = "{{"form".$strategicObjective->id}}" >
              <div id = "{{"alert".$strategicObjective->id}}"></div>
              {{ csrf_field() }}
              <input type = "hidden" value ="{{$strategicObjective->id}}" name="strategicObjective"/>
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
                                        {{-- hidden input to et the value of the arithmetic structure. --}}
                                        <input type="hidden" id="{{"arithmeticStructure".$kpi->id}}" value = "{{$kpi->arithmeticStructure}}"/>
                                        <div class=" col-md-1"style="text-align:center">
                                            <p>{{$kpi->id}}</p>
                                        </div>
                                        <div class=" col-md-4" style="text-align:left">
                                            <p>{{$name3}}</p>
                                        </div>
                                        <div class=" col-md-1" style="text-align:center"><p>{{$score}}</p></div>
                                        <div class=" col-md-1"style="text-align:center">
                                            <p id = "{{"target".$kpi->id}}" class ="{{"target".$kpi->id}}" >{{$kpi->target}}</p>
                                        </div>
                                        <div class=" col-md-1"><input   type = "number" step=".01" required id = "{{"Quater1".$kpi->id}}"class="form-control {{"Quater1".$kpiOriginalName}}" /></div>
                                        <div class=" col-md-1"><input   type = "number" step=".01"  id = "{{"Quater2".$kpi->id}}" readonly placeholder="Inactive" class="form-control {{"Quater2".$kpiOriginalName}}" /></div>
                                        <div class=" col-md-1"><input   type = "number" step=".01"  id = "{{"Quater3".$kpi->id}}" readonly placeholder="Inactive" class="form-control {{"Quater3".$kpiOriginalName}}" /></div>
                                        <div class=" col-md-1"><input   type = "number" step=".01"  id = "{{"Quater4".$kpi->id}}" readonly placeholder="Inactive"class="form-control {{"Quater4".$kpiOriginalName}}" /></div>                                      
                                        {{-- <div class=" col-md-3"><textarea  id="{{"reason".$kpiOriginalName}}"  readonly style="height:35px;">N/A</textarea></div> --}}
                                        <div id="{{"unmetTargetComment".$kpi->id}}" class = "col-md-1 text-center unmetTargetComment">
                                          <a data-toggle="modal" href = "" data-target="{{"#modal".$kpi->id}}"> COMMENT</a>
                                        </div>
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
            {{-- inserting the modals that will be thrown once the targets are not reached. --}}
            @foreach ($kpis as $kpiModal)
            <div class="modal fade" role="dialog" tabindex="-1" id="{{"modal".$kpiModal->id}}">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <h4 class="text-center modal-title">Kindly Fill The Following Fields to Complete Assesing :: <strong>{{$kpiModal->name}}.</strong></h4>
                      </div>
                      <div class="modal-body">
                          <form>
                              <div class="row" style="margin-bottom:1%;">
                                  <div class="col-lg-3 col-md-3">
                                      <p class="text-center">Root Cause for not meeting target.</p>
                                  </div>
                                  <div class="col-lg-9 col-md-9"><textarea class="form-control" name="rootCause" required="" placeholder="Root Cause For Non Conformity."></textarea></div>
                              </div>
                              <div class="row" style="margin-bottom:1%;">
                                  <div class="col-lg-3 col-md-3">
                                      <p class="text-center">Corretive Action To Meet The Target.&nbsp;</p>
                                  </div>
                                  <div class="col-lg-9 col-md-9"><textarea class="form-control" name="correctiveAction" required="" placeholder="Corrective Action For The Non Conformity."></textarea></div>
                              </div>
                              <div class="row" style="margin-bottom:1%;">
                                  <div class="col-lg-3 col-md-3">
                                      <p class="text-center">Completion Date of Corrective Action.</p>
                                  </div>
                                  <div class="col-lg-9 col-md-9"><input class="form-control" type="date"></div>
                              </div>
                              <div class="row">
                                  <div class="col-lg-3 col-md-3">
                                      <p class="text-center">Permanent Solution To Non conformity.</p>
                                  </div>
                                  <div class="col-lg-9 col-md-9"><textarea class="form-control" name="permanentSolution" required="" placeholder="Permanent Solution To Non Conformity."></textarea></div>
                              </div>
                          </form>
                      </div>
                      <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button><button class="btn btn-success" type="button">Save</button></div>
                  </div>
              </div>
            </div>
            @endforeach
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
@endsection