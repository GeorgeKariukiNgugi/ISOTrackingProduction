@extends('extendingCode.adminExtending')
@section('section')
 
@php
// $name = null;
// $programCode = null;
// $shortHand = null;
    foreach($programs as $program){
        if($program->id == $id){
            $programId = $program->id;
            $name = $program->name;
            $shortHand = $program->shortHand;
            $programCode = $program->programCode;
            $description = $program->description;

            // getting perspective details with the relationships.
            $perspectivesNumber = count($program->perspectives);
            // $strategicObjectiveNumbers = count($program->perspectives->strategicObjectives);

            //getting the strategic objectives = 
            $strategicObjectiveNumbers = 0;
            $kpiNUmbers = 0;
            foreach ($program->perspectives as $perspective) {
                # code...
                $strategicObjectiveNumbers+= count($perspective->strategicObjectives);
                $strategicObjectives = $perspective->strategicObjectives;
                foreach ($strategicObjectives as $strategicObjective) {
                # code...
                $kpiNUmbers += count($strategicObjective->keyPerfomaceIndicators);
            }
            }
            

            
            // count($program->perspectives->strategicObjectives->keyPerfomaceIndicators);
        }
    }
@endphp
<h4 style="font-size:40px;font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;color:#4B94BF;"> <i class="fa fa-trophy"></i> <span> {{$name}} Details. </span> <span><b style="font-size:40px;font-family:Verdana, Geneva, Tahoma, sans-serif"></b></span></h4>
<div class="col-md-12" style="font-family:Georgia, 'Times New Roman', Times, serif;">
        <div class="box box-solid box-info" style="font-family:Georgia, 'Times New Roman', Times, serif;" class="col-md-8 col-md-offset-2">
          <div class="box-header with-border">
            <i class="fa fa-trophy"></i>

            <h4 class="box-title">Program Details.</h4>
            <div class="box-tools">
                    <div role="group" class="btn-group">
                        <button class="btn btn-primary btn-sm" type="button" data-target = "#editingMOdal" data-toggle = "modal"><i class="fa fa-edit"></i><strong>EDIT PROGRAM DETAILS.</strong></button>
                        <button class="btn btn-danger btn-sm" data-target = "#deleteProgram" data-toggle = "modal" type="button"><i class="fa fa-warning"></i><strong>DELETE PROGRAM</strong></button></div>
              </div>
          </div>
          <div class="box-body">
                <div style="font-family:'Times New Roman', Times, serif;" >

                        <div class=" table-responsive no-padding col-md-12 col-md-8 col-md-offset-2">
                                <table class="table table-hover table-striped table-bordered table-condensed">
                                  <tbody>               
                                    <td>
                                     <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">Program Official Name</h4>  
                                    </td>
                                    <td>
                                      <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">{{$name}}</h4>  
                                    </td>                 
                                  </tr>
                                  <tr>
                                      <td>
                                            <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">Program Code.</h4>  
                                      </td>
                                      <td>
                                            <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">{{$programCode}}</h4>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                            <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">Program Short Hand.</h4>
                                      </td>
                                      <td>
                                            <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">{{$shortHand}}</h4>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                            <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">Number Of Perspectives</h4>
                                      </td>
                                      <td>
                                            <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">{{$perspectivesNumber}}</h4>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                            <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">Number Of Strategic Objectives<br /></h4>
                                      </td>
                                      <td>
                                            <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">{{$perspectivesNumber}}</h4>
                                      </td>

                                  </tr>
                                  <tr>
                                      <td>
                                            <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">Number Of KPIs</h4>
                                      </td>
                                      <td>
                                            <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">{{$kpiNUmbers}}</h4>
                                      </td>
                                  </tr>
                                </tbody></table>
                            </div>
                    </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>

      {{-- the section where the modal that is used to delete the programs is implemented. --}}
      <div role="dialog" tabindex="-1" class="modal fade" id="deleteProgram">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="color:rgb(0,0,0);background-color:#eb8383;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title"><strong>Confirmation !!!</strong></h4>
                    </div>
                    <div class="modal-body" style="background-color:#e04d4d;">
                        <h2 style="text-align:center;color:white;"><strong>Are You Sure You Want To Delete The Program ????</srong></h2>
                            <h4 style="text-align:center;color:white;"><strong>{{$name}}</strong></h4>
                    </div>
                    <form action="/deletingProgram" method = "POST">
                        {{ csrf_field() }}
                    <input type="hidden" name="programId" value="{{$programId}}">
                            <div class="modal-footer" style="background-color:#eb8383;"><button class="btn btn-info" type="button" data-dismiss="modal">Close</button><button class="btn btn-success" type="submit"><strong>Delete</strong></button></div>
                    </form>
                    
                </div>
            </div>
        </div>

        {{-- editing a program modal. --}}
        <div role="dialog" tabindex="-1" class="modal fade" id="editingMOdal">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#bad0f2;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h3 class="modal-title">Editing Program Details :{{$name}}</h3>
                            <span style="color:red;font-size:12px;">*edit the required fields only.*</span>
                        </div>
                        <div class="modal-body" style="background-color:#d8e5f9;">
                            <form action="/eitingTheProgram" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="programId" value="{{$programId}}">
                                    <div class="row">
                                            <div class="col-md-6">
                                                <h4>Program Name</h4>
                                            </div>
                                            <div class="col-md-6"><input type="text" name="programName" value="{{$name}}"  style="width:100%;height:35px;" /></div>
                                        </div><br />
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Program Code</h4>
                                            </div>
                                            <div class="col-md-6"><input type="text" name="programCode" value="{{$programCode}}"  style="width:100%;height:35px;" /></div>
                                        </div><br />
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Program ShortHand</h4>
                                            </div>
                                            <div class="col-md-6"><input type="text" name="programShortHand" value="{{$shortHand }}"  style="width:100%;height:35px;" /></div>
                                        </div><br />
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Program Description</h4>
                                            </div>
                                            <div class="col-md-6"><textarea name="programDescription" rows="4"  style="width:100%;">{{$description}}</textarea></div>
                                        </div>
                                        <br /></div>
                                        <div class="modal-footer" style="background-color:#bad0f2;"><button class="btn btn-danger btn-lg" type="button" data-dismiss="modal"><strong>Close</strong></button><button class="btn btn-success active btn-lg" type="submit"><strong>Save</strong></button></div>
                            </form>
                    </div>
                </div>
            </div>

@endsection