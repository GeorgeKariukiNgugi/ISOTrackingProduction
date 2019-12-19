@extends('extendingCode.adminExtending')
@section('section')
<h1 class="text-center" style="font-family:Georgia,Times New Roman,Times,serif;">   <i class="fa fa-group"></i>   Programs Assesors Tab.</h1>
<div class="row">
        <div class="col-xs-12">
          <div class="box box-solid box-success">
            <div class="box-header">
              <h3 class="box-title">Program Assesors Table.</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                        <button class="btn btn-info btn-sm" type="button" data-target="#addingAssesor" data-toggle="modal"><i class="fa fa-user"></i><strong>ADD ASSESOR</strong></button>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

                @foreach ($errors->all() as $error)
                <div role="alert" class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span id="text">{{$error}}</div>
                @endforeach

              <table class="table table-hover table-bordered table-condensed">
                <tbody><tr>
                  <th>S <sub>no</sub></th>
                  <th>Program Name</th>
                  <th>Programe Code</th>
                  <th>Assesor Email.</th>
                  <th>Action</th>
                </tr>
               @php
                   $increment = 1;
               @endphp
                @for ($i = 0; $i < count($programDetails); $i+=4)
                    <tr>
                        <td>{{$increment}}</td>
                        <td>{{$programDetails[$i]}}</td>
                        <td>{{$programDetails[$i+1]}}</td>
                        <td>{{$programDetails[$i+2]}}</td>
                        <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-danger" type="button" data-target = "{{"#deleteAssesor".$increment}}" data-toggle = "modal"><strong>Delete Assesor</strong></button>
                                    <button class="btn btn-primary" type="button" data-target = "{{"#editAssesor".$increment}}" data-toggle = "modal"><strong>Edit Assesor</strong></button></div>
                        </td>
                    </tr>
                    {{-- THIS SECTOPN OF THE CODE IS USED TO CREATE THE MODAL THAT IS USED TO ADD THE DELETING MODAL. --}}
                    <div role="dialog" tabindex="-1" class="modal fade" id="{{"deleteAssesor".$increment}}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="color:rgb(0,0,0);background-color:#eb8383;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title"><strong>Confirmation !!!</strong></h4>
                                    </div>
                                    <div class="modal-body" style="background-color:#e04d4d;">
                                        <p><strong>Are You Sure You Want To Delete The Assesor  {{$programDetails[$i+2]}} ????</strong></p>
                                    </div>
                                    <form action="/deletingAssesor" method = "POST">
                                        {{ csrf_field() }}
                                            <input type="hidden" name="asesorId" value="{{$programDetails[$i+3]}}">
                                            <div class="modal-footer" style="background-color:#eb8383;"><button class="btn btn-info" type="button" data-dismiss="modal">Close</button><button class="btn btn-success" type="submit"><strong>Delete</strong></button></div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>

                        <div role="dialog" tabindex="-1" class="modal fade" id="{{"editAssesor".$increment}}">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                      <h4 class="modal-title">Editing An Assesor.</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form action="/editingUser" method="POST">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="assesorId" value="{{$programDetails[$i+3]}}">
                                      <div class="row">
                                          <div class="col-md-4">
                                              <p>Assesor Email:</p>
                                          </div>
                                          <div class="col-md-8"><input type="email" name="email" style="width:100%;height:30px;" value="{{$programDetails[$i+2]}}"/></div>
                                      </div><br />
                                      <div class="row">
                                          <div class="col-md-4">
                                              <p>Program:</p>
                                          </div>
                                          <div class="col-md-8"><select style="width:100%;height:30px;" name="program">
                                            <option value="0">SELECT A PROGRAM. </option>
                                            @foreach ($programs as $program)
                                            <option value="{{$program->id}}">{{$program->shortHand}}</option>
                                            @endforeach
                                          </select></div>
                                      </div>
                                  </div>
                                  <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal"><strong>Close</strong></button><button class="btn btn-success active" type="submit"><strong>Save.</strong></button></div>
                                </form>
                                </div>
                          </div>
                      </div>
                        @php
                        $increment++;
                    @endphp
                @endfor
                <div role="dialog" tabindex="-1" class="modal fade" id="addingAssesor">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Adding An Assesor.</h4>
                            </div>
                            <div class="modal-body">
                              <form action="/addingAssesor" method="POST">
                                {{ csrf_field() }}                              
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Assesor Email:</p>
                                    </div>
                                    <div class="col-md-8"><input type="email" name="email" style="width:100%;height:30px;"/></div>
                                </div><br />
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Program:</p>
                                    </div>
                                    <div class="col-md-8"><select style="width:100%;height:30px;" name="program">
                                      <option value="none">SELECT A PROGRAM. </option>
                                      @foreach ($programs as $program)
                                      <option value="{{$program->id}}">{{$program->shortHand}}</option>
                                      @endforeach
                                    </select></div>
                                </div>
                            </div>
                            <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal"><strong>Close</strong></button><button class="btn btn-success active" type="submit"><strong>Save.</strong></button></div>
                          </form>
                          </div>
                    </div>
                </div>
              </tbody>
            </table>
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
@endsection