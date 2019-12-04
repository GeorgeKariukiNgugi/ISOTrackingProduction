@extends('extendingCode.adminExtending')
@section('section')

{{-- <p>Non Conformities table.{{$type}}</p> --}}
@php
    $boxColor = "box-info";
    $typeString = null;
@endphp
 @if ($type == 2)
    @php
        $boxColor = "box-danger";
        $text = "THE FOLLOWING ARE THE NONCONFORMITIES THAT ARE OVERDUE CLOSE THEM SOONEST !!!!";
        $typeString= 'open';
    @endphp
     
 @elseif($type == 1)
 @php
     $boxColor = "box-info";
     $text = "THE FOLLOWING NON CONFORMITIES NEED TO BE CLOSED.";
     $typeString= 'open';
 @endphp
    @elseif($type == 0)
    @php
    $boxColor = "box-success";
    $text = "THE FOLLOWING NON CONFORMITIES HAVE SUCCESSFULLY BEEN CLOSED.";
    $typeString= 'closed';
@endphp
 @endif
 <h3 style="font-family:'Times New Roman', Times, serif;text-align:center;">{{$text}}</h3>
 <div class="row" style="font-family:'Times New Roman', Times, serif;">
        <div class="col-xs-12">
          <div class="box box-solid {{$boxColor}}">
            <div class="box-header">
              <h3 class="box-title" style="font-family:'Times New Roman', Times, serif;">{{$text}}</h3>
              <div class="box-tools">
                    @if (count($nonConformities) > 0)
                    <div class="box-tools pull-right">
                        <span style="color:white;"> <a href="/adminNonConformitiesExcelDownload/{{$typeString}}"  style="color:white;"><i class="fa fa-file-excel-o" style="color:white;font-size:25px;"></i>  Download Excel File</a></span>
                      </div>                             
                    @endif
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-striped table-bordered">
                <tbody><tr>
                  <th>S <sub>no</sub> </th>
                  <th>KPI Name</th>
                  <th>Program Name</th>
                  <th> Quater NC Was Identified.</th>

                  @if ($type == 0)
                  <th> Evidence Provided.</th>
                  @elseif($type == 1)
                  <th>Last Day To Close</th>
                  <th>Details</th>
                  @elseif($type == 2)
                      <th>Number Of Days Overdue.</th>
                      <th>Details</th>
                  @endif 
                  
                  {{-- <th>Details</th> --}}
                </tr>
                @php
                    $sno = 1;
                @endphp
                @foreach ($nonConformities as $nonConformity)

                {{-- getting all the data that we will add to the table. --}}
                @php
                    //! getting the ki name
                    foreach ($kpis as $kpi) {
                      # code...
                      if($kpi->id == $nonConformity->keyPerfomanceIndicator_id){
                        $kpiName = $kpi->name;
                        $kpiName = str_replace('_', ' ', $kpiName);
                        $kpiName = ucwords($kpiName);
                      }
                    }

                    //getting the program code.
                    foreach ($programs as $program) {
                      # code...
                      if($program->id == $nonConformity->program_id){

                        $programCode = $program->shortHand;

                      }
                    }
                @endphp
                
                    <tr>
                      <td> 
                        {{$sno++}}
                      </td>
                      <td>
                        {{$kpiName}}
                      </td>
                      <td>
                        {{$programCode}}
                      </td>
                      <td>
                        {{$nonConformity->year. '  '.$nonConformity->quater}}
                      </td>
                    @if ($type == 0)

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

                    @elseif($type == 1)

                    {{-- implementing the date --}}
                    @php                      
                        $dateToFormat = date_create($nonConformity->date);
                        $date = date_format($dateToFormat, "D-d-F-Y");  
                    @endphp
                      <td>{{$date}}</td>
                      <td> <button class="btn btn-warning btn-small" data-target = "{{"#moreDatailsButton".$nonConformity->id}}" data-toggle="modal">NC Details.</button></td>
                    @elseif($type == 2)
                    <td>
                        @php
                            $todaysdate = date_create(date('Y-m-d H:i:s'));

                            $lastDate = date_create($nonConformity->date);
                            $daysLate = $todaysdate->diff($lastDate);                            
                            $timeLate = $daysLate->d." Days ".$daysLate->h." Hours  ".$daysLate->i."  Minutes";
                        @endphp
                        <b style="color:red;">{{$timeLate}}</b>                        
                      </td>
                      <td> <button class="btn btn-warning btn-small" data-target = "{{"#moreDatailsButton".$nonConformity->id}}" data-toggle="modal">NC Details.</button></td>
                    @endif

                    </tr>

                    <div role="dialog" tabindex="-1" class="modal fade" id={{"moreDatailsButton".$nonConformity->id}}>
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header"style="background-color:#f3ff6a" ><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">KPI NC Details:</h4>
                                </div>
                                <div class="modal-body" style="background-color:#f8ffaa">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><strong>KPI Name:</strong></p>
                                        </div>
                                        <div class="col-md-8">
                                            <p>{{$kpiName}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><strong>Root Cause:</strong></p>
                                        </div>
                                        <div class="col-md-8">
                                            <p>{{$nonConformity->rootCause}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><strong>Correction :</strong></p>
                                        </div>
                                        <div class="col-md-8">
                                            <p>{{$nonConformity->correction}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><strong>Correcive Action</strong></p>
                                        </div>
                                        <div class="col-md-8">
                                            <p>{{$nonConformity->correctiveAction}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer" style="background-color:#f3ff6a;"><button class="btn btn-danger" type="button" data-dismiss="modal"><strong>Close</strong></button></div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
              </tbody>
            <tfoot>
                    <th>S <sub>no</sub> </th>
                    <th>KPI Name</th>
                    <th>Program Name</th>
                    <th> Quater NC Was Identified.</th>

                    @if ($type == 0)
                    <th> Evidence Provided.</th>
                    @elseif($type == 1)
                    <th>Last Day To Close</th>
                    <th>Details</th>
                    @elseif($type == 2)
                        <th>Number Of Days Overdue.</th>
                        <th>Details</th>
                    @endif  
                                      
            </tfoot>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
@endsection