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
     
 @else
 @php
     $boxColor = "box-info";
     $text = "THE FOLLOWING NON CONFORMITIES NEED TO BE CLOSED."
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
                    <th class="sorting" tabindex="0" >Perspeective Name.</th>
                    @if ($state == 1)

                    <th> No OverDue Days</th>
                        
                    @else
                        <th>Last Day To Close.</th>
                    @endif                        
                    <th class="sorting" tabindex="0" >Actions.</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($nonConformities as $nonConformity)
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
                            $perspectiveNames = $nonConformity->perspective->name;
                            $perspectiveShortHand = $nonConformity->program->shortHand;                            
                            $shortHandCount = strlen($perspectiveShortHand); 
                            $name = str_replace('_', ' ', substr($perspectiveNames,$shortHandCount));
                            $name = ucwords($name);
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
                          
                      @else
                          <td>
                            @php
                                $dateToFormat = date_create($nonConformity->date);
                                $date = date_format($dateToFormat, "D-d-F-Y");                                
                            @endphp
                            {{$date}}
                          </td>
                      @endif
                      <td>
                          <div class="btn-group" role="group">
                            <button class="btn btn-warning btn-sm" type="button"><strong>More Details</strong></button>
                            <button class="btn btn-success btn-sm" type="button"><strong>Close NC.</strong></button>
                          </div>
                      </td>
                    </tr>
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
                      
                  @else
                      <th>Last Day To Close.</th>
                  @endif                       
                  <th>Actions.</th>
              </tr>
              </tfoot>
            </table>
            @endif
    </div></div>
    </div>
    <!-- /.box-body -->
  </div>


@endsection