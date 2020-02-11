@extends('extendingCode.adminExtending')
@section('section')
<h3 style="font-size:40px;font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;color:#4B94BF;"> <i class="fa fa-plus"></i> <span> ADDING A NEW PROGRAM. </span> <span><b style="font-size:40px;font-family:Verdana, Geneva, Tahoma, sans-serif"></b></span></h3>
<br>
<h4 style="font-size:30px;font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;">STEP 1. </h4>
<br>
<div class="row" style="font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;">
        <div class="col-md-8 col-md-offset-2" style="background-color:#d7e0eb;padding-top:2%;padding-bottom:3%;border-radius:30px;">
        @foreach ($errors->all() as $error)
        <div role="alert" class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span id="text">  {{$error}}</span></div>
        @endforeach
            <form method="post" enctype="multipart/form-data" action="{{action('adminController\adminController@submittingProgramDetails')}}">
            {{ csrf_field() }}    
            <div class="row">
                    <div class="col-md-4">
                        <p><strong>Program Name:</strong></p>
                    </div>
                    <div class="col-md-8"><input type="text"  name="name" required placeholder="e.g business contuinity management system" class="form-control" /></div>
                </div><br />
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Program Description :</strong></p>
                    </div>
                    <div class="col-md-8"><textarea  required name="description" placeholder="e.g this program handles all the organisations business contuinity plans ...." class="form-control"></textarea></div>
                </div><br />
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Program ShortHand:</strong></p>
                    </div>
                    <div class="col-md-8"><input type="text" required placeholder="e.g BCMS" name="progamShortHand" class="form-control" /></div>
                </div><br />
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Program Code:</strong></p>
                    </div>
                    <div class="col-md-8"><input type="text" required name="progamCode" placeholder="e.g ISO/22301" class="form-control" /></div>
                </div><br />
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Program Image: <span>(Not more than 2mb.)</span></strong></p>
                    </div>
                    <div class="col-md-8"><input type="file" name = "image"/> </div>
                </div><br />
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Program Color: (click the black button <i class="fa fa-hand-o-right"></i>    to select a color.)</strong></p>
                    </div>
                    <div class="col-md-8"><input type="color" name = "color" required/></div>
                </div><br />
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-4"><a class="btn btn-danger btn-block btn-lg" role="button" href="/addingNewProramStep0"><i class="fa fa-backward"></i><strong>BACK</strong></a></div>
                            <div class="col-md-4"><button class="btn btn-warning btn-block btn-lg" role="button" type="reset"><i class="fa fa-refresh"></i><strong>RESET</strong></button></div>
                            <div class="col-md-4"><button class="btn btn-success btn-block btn-lg" type="submit"><strong>STEP 2</strong><i class="fa fa-forward"></i></button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection