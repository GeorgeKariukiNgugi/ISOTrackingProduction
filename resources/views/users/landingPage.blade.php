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
<div id = "ajaxReload">
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

{{-- GETTING THE QUATER THAT IS ACTIVE AND ALSO THE YEAR THAT IS ACTIVE. --}}
<input type = "hidden" value="{{$activeQuater}}" name = "activeQuater" id = "activeQuater">
<input type = "hidden" value="{{$activeYaer}}" name = "activeYear" id="activeYear">


<div style="margin-bottom:5%;margin-top:5%"id="heading">
<h1 class="text-center" style="font-family:Times New Roman;">Welcome To Safaricom {{$name}} Score Card.    <b>{{$activeYaer}}</b></h1>
    <h1 class="text-center" style="font-family:Times New Roman;">({{$programShortHand}})</h1>
    <h2 class="text-center" style="font-family:Times New Roman;">Update the <b>{{$activeQuater}}</b> Scores based on the perspectives that have been listed below :-</h2>
</div>
    
<div class="panel-group" id="accordion" role="tablist">  
@foreach ($perspectives as $perspective)
    
    {{-- getting the name of the particular perspective. --}}

    @php
        $perspectiveId = $perspective->id;
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
                      <a class="btn btn-success btn-md" data-toggle="modal" data-target="{{"#modal".$strategicObjective->id}}"> <b>Add New</b> </a>                  
                  </div>
              </div>
            </div> 
            <div role="dialog" tabindex="-1" class="modal fade" id="{{"modal".$strategicObjective->id}}">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title" style="text-align:center;">Add a new KPI to the Strategic Objective : <strong>{{$perspetiveName}}</strong></h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" id = "{{"modalSubmit".$strategicObjective->id}}">
                            <div id="{{"KPIalert".$strategicObjective->id}}"></div>
                          {{ csrf_field() }}
                            <input type="hidden" name="perpective" value="{{$perspectiveId}}">
                            <input type="hidden" name="strategicObjective" value="{{$strategicObjective->id}}">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <p><strong>Name of KPI:</strong></p>
                                </div>
                                <div class="col-lg-6 col-md-6"><input type="text" required name="kpiName" /></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <p><strong>Target</strong></p>
                                </div>
                                <div class="col-lg-6 col-md-6"><input type="number" required name="kpiTarget" /></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <p><strong>Arithmtic Structure</strong></p>
                                </div>
                                <div class="col-lg-6 col-md-6"><select required name="arithmeticStructure"><optgroup label="Arithmetic Structure"><option value="1">Above</option><option value="0">Below</option></optgroup></select></div>
                            </div>
                            <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button><button class="btn btn-success" type="submit">Save</button></div>
                        </form>
                          

                      </div>
                      
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
                               $scoreRecordedNumberReturned = count($keyPerfomanceIndicatorsScores);

                              //!  getting the score of the particular strategic objective.
                               if(is_null($keyPerfomanceIndicatorsScores)){
                                $score = 0;
                                // dd("null");
                               }
                               else{
                                //  dd($scoreRecordedNumberReturned);
                                if ($scoreRecordedNumberReturned<1) {
                                  # code...
                                  $score = 0;
                                } else {
                                  # code...                                
                                        foreach($keyPerfomanceIndicatorsScores as $keyPerfomanceIndicatorsScoress)
                                      {
                                        // dd($keyPerfomanceIndicatorsScoress);
                                        $scoreKPI = $keyPerfomanceIndicatorsScoress->kpi_id;
                                        $scoreYear = $keyPerfomanceIndicatorsScoress->year;
                                        if($scoreKPI == $kpiId){
                                            $score = $keyPerfomanceIndicatorsScoress->ytd;
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


                                        {{-- CHECKING THE VALUES OF VARIOUS QUATERS. --}}
                                        @php
                                            // values for QUATER ONE.
                                            $Q1Value = '';
                                            $numberOfQuater1Records = count($quaterOne);
                                            if($numberOfQuater1Records == 0){
                                                $Q1Value = '';
                                            }else{
                                              foreach($quaterOne as $quaterOnes){
                                                if($quaterOnes->keyPerfomanceIndicator_id == $kpi->id){
                                                  $Q1Value = $quaterOnes->score;
                                                }                                              
                                              }
                                            }
         
                                            //values for quater two
                                            $Q2Value = '';
                                            $numberOfQuater2Records = count($quaterTwo);
                                            if($numberOfQuater2Records == 0){
                                                $Q2Value = '';
                                            }else{
                                              foreach($quaterTwo as $quaterTwos){
                                                if($quaterTwos->keyPerfomanceIndicator_id == $kpi->id){
                                                  $Q2Value = $quaterTwos->score;
                                                }                                              
                                              }
                                            }
         
                                            //values for quater three. 
                                            $Q3Value = '';
                                            $numberOfQuater3Records = count($quaterthree);
                                            if($numberOfQuater3Records == 0){
                                                $Q3Value = '';
                                            }else{
                                              foreach($quaterthree as $quaterthrees){
                                                if($quaterthrees->keyPerfomanceIndicator_id == $kpi->id){
                                                  $Q3Value = $quaterthrees->score;
                                                }                                              
                                              }
                                            }
         
                                            //values for quater four.
                                            $Q4Value = '';                                            
                                            $numberOfQuater4Records = count($quaterfour);
                                            if($numberOfQuater4Records == 0){
                                                $Q4Value = '';
                                            }else{
                                              foreach($quaterfour as $quaterfours){
                                                if($quaterfours->keyPerfomanceIndicator_id == $kpi->id){                                                  
                                                  $Q4Value = $quaterfours->score;                                                  
                                                }                                                                                          
                                              }                                               
                                            }
         
                                        @endphp

                                        <div class=" col-md-1"><input   value="{{$Q1Value}}" type = "number" step=".01"  name = "{{"Quater1".$kpi->id}}" id = "{{"Quater1".$kpi->id}}" readonly placeholder="Inactive" class="form-control {{"Quater1".$kpiOriginalName}}" /></div>
                                        <div class=" col-md-1"><input   value="{{$Q2Value}}" type = "number" step=".01"  name = "{{"Quater2".$kpi->id}}" id = "{{"Quater2".$kpi->id}}" readonly placeholder="Inactive" class="form-control {{"Quater2".$kpiOriginalName}}" /></div>
                                        <div class=" col-md-1"><input   value="{{$Q3Value}}" type = "number" step=".01"  name = "{{"Quater3".$kpi->id}}" id = "{{"Quater3".$kpi->id}}" readonly placeholder="Inactive" class="form-control {{"Quater3".$kpiOriginalName}}" /></div>
                                        <div class=" col-md-1"><input   value="{{$Q4Value}}" type = "number" step=".01"  name = "{{"Quater4".$kpi->id}}" id = "{{"Quater4".$kpi->id}}" readonly placeholder="Inactive"class="form-control {{"Quater4".$kpiOriginalName}}" /></div>                                                                              
                                        <div id="{{"unmetTargetComment".$kpi->id}}" class = "col-md-1 text-center unmetTargetComment">
                                          {{-- <a data-toggle="modal" href = "" data-target="{{"#modal".$kpi->id}}"> COMMENT</a> --}}
                                        </div>
                                        <input type="hidden" name = "{{"nonConformityFlag".$kpi->id}}" value= "1" id = "{{"nonConformityFlag".$kpi->id}}">

                                      </div>
                               @endforeach
                               <div class="box-footer">   
                                {{-- Adding the Modal That is used to add the Key Perfomance Indicators.  --}}
                                {{-- id="{{ "modal".$originalObjectiveName}} --}}                                                                    
                                <div style="text-align:left" class="col-md-6">
                                  <a class="btn btn-success btn-md" data-toggle="modal" data-target="{{"#modal".$strategicObjective->id}}"> <b>Add New</b> </a>
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
                      <div id="{{"NonConformitymodal".$kpiModal->id}}"></div>
                      <div class="modal-body">
                          <form id="{{"unmetTargetModal".$kpiModal->id}}" class = "{{"unmetTargetModal".$kpiModal->id}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="nonConformitykpiId" value="{{$kpiModal->id}}">
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
                                  <div class="col-lg-9 col-md-9"><input required class="form-control" name = "date" type="date"></div>
                              </div>
                              <div class="row">
                                  <div class="col-lg-3 col-md-3">
                                      <p class="text-center">Permanent Solution To Non conformity.</p>
                                  </div>
                                  <div class="col-lg-9 col-md-9"><textarea class="form-control" name="permanentSolution" required="" placeholder="Permanent Solution To Non Conformity."></textarea></div>
                              </div>
                              <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button><button class="btn btn-success" type="submit">Save</button></div>
                          </form>
                      </div>                      
                  </div>
              </div>
            </div>
            @endforeach
          </div>

           <div role="dialog" tabindex="-1" class="modal fade" id="{{"modal".$strategicObjective->id}}">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title" style="text-align:center;">Add a new KPI to the Strategic Objective :  <strong>{{$perspetiveName}}</strong></h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" id = "{{"modalSubmit".$strategicObjective->id}}">
                          <div id="{{"KPIalert".$strategicObjective->id}}"></div>
                          {{ csrf_field() }}
                            <div class="row">
                              <input type="hidden" name="perpective" value="{{$perspectiveId}}">
                              <input type="hidden" name="strategicObjective" value="{{$strategicObjective->id}}">
                                <div class="col-lg-6 col-md-6">
                                    <p><strong>Name of KPI:</strong></p>
                                </div>
                                <div class="col-lg-6 col-md-6"><input type="text" required name="kpiName" /></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <p><strong>Target</strong></p>
                                </div>
                                <div class="col-lg-6 col-md-6"><input type="number" required name="kpiTarget" /></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <p><strong>Arithmtic Structure</strong></p>
                                </div>
                                <div class="col-lg-6 col-md-6"><select required name="arithmeticStructure"><optgroup label="Arithmetic Structure"><option value="1">Above</option><option value="0">Below</option></optgroup></select></div>
                            </div>
                            <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button><button class="btn btn-success" type="submit">Save</button></div>
                        </form>
                          

                      </div>
                      
                  </div>
              </div>
          </div>      
          @endif  
          {{-- this section is used to add the modal for adding a new KPI. --}}
          @php
              // dd($strategicObjective->name);
          @endphp          
            
          @endforeach

      @endif

    </div>
  </div>
</div>
@endforeach
</div>
<script src="design/assets/js/jquery.min.js"></script>
</div>
@endsection