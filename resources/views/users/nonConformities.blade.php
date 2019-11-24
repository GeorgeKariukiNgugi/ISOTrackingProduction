@extends('extendingCode.usersExtending')
@section('navigationBar')

<li>
    <a href="/home">
      <i class="fa fa-address-card"></i>
    </a>
</li> 


<li>            
    <a href="{{"/dashBoard/".$id}}">
      <i class="fa fa-dashboard"></i>              
    </a>
  </li> 
  <li>            
    <a href="{{"/nonconformities/".$id."/1"}}" data-toggle="tooltip" title=" Non-conformities out of date">
      {{-- <i class="fa fa-bell-o" style="color:#F39C12;"></i>             --}}
      <i class="fa fa-bell" style="color:rgb(255,0,0);"></i>
    </a>
  </li>    
  {{-- checking all the non conformities that are both to be implemented and also out of date. --}}

  <li>            
      <a href="{{"/nonconformities/".$id."/0"}}" data-toggle="tooltip" title="All Non Conformities.">
        {{-- <i class="fa fa-flag-o" style="color:red;"></i>               --}}
        <i class="fa fa-flag" style="color:rgb(255,215,6);"></i>
      </a>
    </li>
    <li>            
        <a href="{{"/nonconformities/".$id."/2"}}" data-toggle="tooltip" title="All Non Conformities.">
          {{-- <i class="fa fa-flag-o" style="color:red;"></i>               --}}
          <i class="fa fa-thumb-tack"></i>
        </a>
      </li>
@endsection


@section('section')
@php
    $boxColor = "box-info";
@endphp
 @if ($state == 1)
    @php
        $boxColor = "box-danger";
        $text = "THE FOLLOWING ARE THE NONCONFORMITIES THAT ARE OVERDUE CLOSE THEM SOONEST !!!!";
    @endphp
     
 @elseif($state == 0)
 @php
     $boxColor = "box-info";
     $text = "THE FOLLOWING NON CONFORMITIES NEED TO BE CLOSED."
 @endphp
    @elseif($state == 2)
    @php
    $boxColor = "box-success";
    $text = "THE FOLLOWING NON CONFORMITIES HAVE SUCCESSFULLY BEEN CLOSED."
@endphp
 @endif
    <h3 style="font-family:'Times New Roman', Times, serif;text-align:center;">{{$text}}</h3>
<div class="box {{$boxColor}} box-solid">
    <div class="box-header with-border">
            <h1 class="box-title" style="text-align:center;"> <b>Non Conformities Table For : {{$programmeName}}</b></h1>
            <div class="box-tools pull-right">
              <span style="color:white;"> <a href="#"  style="color:white;"><i class="fa fa-file-excel-o" style="color:white;font-size:25px;"></i>  Download Excel File</a></span>
            </div>
            <!-- /.box-tools -->
          </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row"><div class="col-sm-6"></div>
          <div class="col-sm-6"></div></div>
          <div class="row">
              <div class="col-sm-12">
                  
          @php
              $incrementValue= 1;
          @endphp
            {{-- this is the area that the nonconformities table will appear. --}}
            @if (count($nonConformities) == 0)
            <div class="col-md-6 col-md-offset-3" style="text-align:center;">
                <h3> <b>There are no nonconformities that have been found in this section.</b> </h3>  
              </div>                              
            @else
            <table id="example2" class="table table-bordered table-hover table-striped dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" >S<sub>no</sub></th>
                    <th class="sorting" tabindex="0" >KPI Name.</th>
                    <th class="sorting" tabindex="0">Strategic Objective Name.</th>
                    <th class="sorting" tabindex="0" > Quater NC Identified.</th>
                    @if ($state == 1)

                    <th> No OverDue Days</th>
                    <th class="sorting" tabindex="0" >Actions.</th>  
                    @elseif($state == 0) 
                        <th>Last Day To Close.</th>
                        <th class="sorting" tabindex="0" >Actions.</th>
                    @elseif($state == 2)  
                    <th> Date closed.</th>
                    <th>Evidence Provided.</th>
                    @endif                        
                    
                </tr>
                </thead>
                <tbody>
                @foreach ($nonConformities as $nonConformity)

                
                
                {{-- @php
                foreach ($closedNonConformities as $closedNonConformity) {
                    # code...
                    if($nonConformity->id == $closedNonConformity->nonConformity_id){
                        $evidence = $nonConformity->id;
                    }
                break;
                }
                    

                @endphp --}}
                    <tr>
                      <td>
                        {{-- inserting the increment number --}}
                        {{$incrementValue++}}                        
                      </td>  

                      <td>
                        {{-- getting the key perfomance indicator. --}}
                        @php
                            $kpiName  = $nonConformity->keyPerfomaceIndicator->name;
                            $kpiName = str_replace('_', ' ', $kpiName);
                            $kpiName = ucwords($kpiName);
                        @endphp
                        {{$kpiName}}
                      </td>

                      <td>
                        {{-- getting the strategicObjective  --}}
                        @php
                            $strategicObjectiveName = $nonConformity->strategicObjective->name;
                            $strategicObjectiveName = str_replace('_', ' ', $strategicObjectiveName);
                            $strategicObjectiveName = ucwords($strategicObjectiveName);
                        @endphp
                        {{$strategicObjectiveName}}
                      </td>

                      <td>
                        {{-- inserting the perspective name of the nonconformity. --}}
                        @php
                            // $perspectiveNames = $nonConformity->perspective->name;
                            // $perspectiveShortHand = $nonConformity->program->shortHand;                            
                            // $shortHandCount = strlen($perspectiveShortHand); 
                            // $name = str_replace('_', ' ', substr($perspectiveNames,$shortHandCount));
                            // $name = ucwords($name);
                            $quater = $nonConformity->quater;
                            $year = $nonConformity->year;
                            $name = $year.'  '. $quater;
                        @endphp
                        {{$name}}
                      </td>
                      @if ($state == 1)

                      <td>
                        @php
                            $todaysdate = date_create(date('Y-m-d H:i:s'));

                            $lastDate = date_create($nonConformity->date);
                            $daysLate = $todaysdate->diff($lastDate);                            
                            $timeLate = $daysLate->d." Days ".$daysLate->h." Hours  ".$daysLate->i."  Minutes";
                        @endphp
                        <b style="color:red;">{{$timeLate}}</b>                        
                      </td>
                          
                      @elseif($state == 0)
                          <td>
                            @php
                                $dateToFormat = date_create($nonConformity->date);
                                $date = date_format($dateToFormat, "D-d-F-Y");                                
                            @endphp
                            {{$date}}
                          </td>
                      @endif
                      @if ($state == 1 OR $state == 0)
                      <td>
                        <div class="btn-group" role="group">
                          <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target= "{{"#moreInformationModal".$nonConformity->id}}"><strong>More Details</strong></button>
                          <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target= "{{"#closingNCModal".$nonConformity->id}}"><strong>Close NC.</strong></button>
                        </div>
                    </td>
                    @else 
                        
                    {{-- checking the date that the nonconformity was closed. --}}

                    <td>

                        
                        @php
                            $dateToFormat = date_create($nonConformity->date);
                            $date = date_format($dateToFormat, "D-d-F-Y");
                        @endphp

                        {{$date}}
                    </td>

                    {{-- this is the section that will contain the code that has the evidence of the non conformity.. --}}
                        <td>
                            @php
                                $evidence = $nonConformity->noncoformityEvidence->locationOfEvidence;
                                if ($evidence == 'N/A') {
                                    # code...
                                    $location = "No Supporting Document was supplied.";
                                    echo $location;
                                } else {
                                    # code...
                                    echo "<a  download href = '/storage/evidence/".$evidence."''> Click To Download The Document Supplid.</a>";
                                }
                                
                            @endphp
                        </td>
                      @endif
                      
                    </tr>
                    {{-- THIS SECTION OF THE CODE IS DIRECTED TOWARDS THE CLOSURE OF THE NON CONFORMITIES. --}}


                    <div role="dialog" tabindex="-1" class="modal fade" id="{{"closingNCModal".$nonConformity->id}}">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#0af288;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Close The Non-Conformity: <b> {{$kpiName}}</b></h4>
                                </div>
                                <div class="modal-body" style="background-color:#ECF0F5;">
                                    <form action="{{url('/closingNonConformity')}}" method="POST" enctype="multipart/form-data" id="{{"ClosingNonConformity".$nonConformity->id}}">
                                      {{ csrf_field() }}
                                        <input type="hidden" name="{{'nonConformityId'}}" id ="{{'nonConformityId'.$nonConformity->id}}" value = "{{$nonConformity->id}}"/>
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <h4><strong>Brief Description Of Closure:</strong></h4>
                                            </div>
                                            <div class="col-lg-7 col-md-7"><textarea required place-holder = "Briefly Describe How You Achieved To Close The Non-Conformity."class="form-control" cols="60" name="{{"briefDescription"}}"></textarea></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <h4 style="color:rgb(0,0,0);"><strong>Kindly Attach Supporting Document.</strong><span style="color:rgb(245,13,13);">*optional</span></h4>
                                            </div>
                                            <div class="col-lg-7 col-md-7">
                                                <div class="btn btn-default btn-file"><i class="fa fa-paperclip"></i>Attachment<input type="file" name="{{"attachment"}}" /></div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5">
                                                <h4 style="color:rgb(0,0,0);"><strong>Date Corrective Action Was Implemented:</strong></h4>
                                            </div>
                                            <div class="col-lg-7 col-md-7"><input type="date" required name="closureDate" class="form-control" /></div>
                                        </div>                                                                            
                                </div>
                                <div class="modal-footer" style="background-color:#0af288;;"><button class="btn btn-danger" type="button" data-dismiss="modal"><strong>cancel</strong></button><button class="btn btn-success" type="submit"><strong>Close NC</strong></button></div>
                              </form>
                              </div>
                        </div>
                    </div>


                    {{-- THIS IS THE MODAL THAT WILL BE CALLED ONCE THE MORE DETAILS BUTTON IS CLICKED. --}}
                    <div role="dialog" tabindex="-1" class="modal fade" id="{{"moreInformationModal".$nonConformity->id}}">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center" style="background-color:#0af288;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Details For The Non Conformity For KPI  <b>{{$kpiName}}</b></h4>
                                </div>
                                <div class="modal-body" style="background-color:#ECF0F5;">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4><strong>KPI Name:</strong></h4>
                                        </div>
                                        <div class="col-md-9">
                                            <h5>{{$kpiName}}</h5>
                                        </div>
                                    </div>
                                  </hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4><strong>Stategic Obj Name:</strong></h4>
                                        </div>
                                        <div class="col-md-9">
                                            <h5>{{$strategicObjectiveName}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4><strong>Perspective  Name:</strong></h4>
                                        </div>
                                        <div class="col-md-9">
                                            <h5>{{$name}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4><strong>Root Cause:</strong></h4>
                                        </div>
                                        <div class="col-md-9">
                                            <h5>{{$nonConformity->rootCause}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4><strong>Corrective Action:</strong></h4>
                                        </div>
                                        <div class="col-md-9">
                                            <h5>{{$nonConformity->correctiveAction}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4><strong>Permenent Solution</strong></h4>
                                        </div>
                                        <div class="col-md-9">
                                            <h5>{{$nonConformity->correction}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4><strong>Date For Closure:</strong></h4>
                                        </div>
                                        <div class="col-md-9">
                                          @php
                                            $dateToFormat = date_create($nonConformity->date);
                                            $date = date_format($dateToFormat, "D-d-F-Y");     
                                          @endphp
                                            {{$date}}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer" style="background-color:#0af288;"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
                            </div>
                        </div>
                    </div>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                  <th>S<sub>no</sub></th>
                  <th>KPI Name.</th>
                  <th>Strategic Objective Name.</th>
                  <th>Perspeective Name.</th> 
                  @if ($state == 1)

                  <th> No OverDue Days</th>
                      
                  @elseif($state == 0)
                      <th>Last Day To Close.</th>
                      @elseif($state == 2)
                      <th>Date Closed.</th>
                  @endif 
                  @if ($state == 0 OR $state == 1)
                  <th>Actions.</th>
                  @else
                      <th>Evidence Provided.</th>
                  @endif
                  
              </tr>
              </tfoot>
            </table>
            @endif
    </div></div>
    </div>
    <!-- /.box-body -->
  </div>


@endsection