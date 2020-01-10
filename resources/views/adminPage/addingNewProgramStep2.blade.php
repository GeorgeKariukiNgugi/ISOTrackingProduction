@extends('extendingCode.adminExtending')
@section('section')
<h3 style="font-size:40px;font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;color:#4B94BF;"> <i class="fa fa-plus"></i> <span> ADDING A NEW PROGRAM. </span> <span><b style="font-size:40px;font-family:Verdana, Geneva, Tahoma, sans-serif"></b></span></h3>
<br>
<h4 style="font-size:30px;font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;">STEP 2. </h4>
<div>
    <div class="row" style="font-size:25px;font-family:Georgia, 'Times New Roman', Times, serif;text-decoration:underline;">
        <div class="col-md-10 col-md-offset-1" style="color:#4c00ef;">
                 
                <h4 style="font-size:25px;font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;text-decoration: underline">{{$name. '   '. $progamShortHand. '   '.$progamCode}}</h4>           
            
                </div>
        </div>
    </div>
<br>

<div style="background-color:#D7E0EB;border-radius:50px;padding-top:5%;padding-bottom:5%" class="col-md-10 col-md-offset-1">
<h4 style="font-size:25px;font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;"> Kindly Select The Perspectives That will Be Applied To The Program.</h4>
<div class="row" style="font-size:18px;font-family:Georgia, 'Times New Roman', Times, serif;">
        @foreach ($errors->all() as $error)
        <div role="alert" class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span id="text">{{$error}}</div>
        @endforeach

        @if ($unmetWeight > 0)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <div role="alert" class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span id="text">The Perspectves Weight Donot Add Up To 100, {{$unmetWeight}}  Given.</div>
            </div>
        </div>
        @endif

        @if ($numbersSubmitted == 0)
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        <div role="alert" class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span id="text">No Perspectives Have Been Added In Your Custom Perspectives. Kindly Add</div>
                </div>
            </div>
        @endif

        @if ($sumOfWeight>0)
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        <div role="alert" class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span id="text">The Perspective Weight does not add up to 100 {{$sumOfWeight}} given.</div>
                </div>
            </div>
        @endif
        <div class="col-md-8 col-md-offset-2">
            <form method="post" action= "/submittingPerspectives" >
                {{ csrf_field() }}
                <input type="hidden" name="programId" value="{{$id}}">
                <input type="hidden" name="shorthand" value="{{$progamShortHand}}">
                <input type="hidden" name="name" value="{{$name}}">
                <input type="hidden" name="code" value="{{$progamCode}}">
                <div class="radio" style="margin-left:35%;"><label><input type="radio" id="primitivePerspectiveRadio" required name = "perspective" value="primitive"/>Apply Primitive Perspectives:<br /></label></div>
                <ol style="margin-left:35%;">
                    <li>Finanacial Perspective.</li>
                    <li>Customer Perspetive.</li>
                    <li>Internal business process perspective</li>
                    <li>Learning_and_growth perspective</li>
                </ol>
                <br>
                <div id="primitive_perspective">
                        <h3 style="text-align:center;font-size:18px;font-family:Georgia, 'Times New Roman', Times, serif;"> <b>The weights should add up to 100.</b></h3>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <p>Finanacial Perspective.<br /></p>
                        </div>
                        <div class="col-md-4 col-md-offset-1"><input type="number"  id="perspectivePrimitivef" name="perspectivePrimitivef" placeholder="number"/></div><br /><br /></div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <p>Customer Perspetive.<br /></p>
                        </div>
                        <div class="col-md-4 col-md-offset-1"><input type="number" id="perspectivePrimitivec" name="perspectivePrimitivec" placeholder="number"/></div><br /><br /></div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <p>Internal business process perspective<br /></p>
                        </div>
                        <div class="col-md-4 col-md-offset-1"><input type="number" id="perspectivePrimitiveib" name="perspectivePrimitiveib" placeholder="number"/></div><br /><br /></div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <p>Learning_and_growth perspective<br /></p>
                        </div>
                        <div class="col-md-4 col-md-offset-1"><input type="number" id="perspectivePrimitivelg" name="perspectivePrimitivelg" placeholder="number"/></div><br /></div>
                </div>
                
                <div class="radio" style="margin-left:35%;"><label><input type="radio" name = "perspective"value="custom" id="customPerspectiveRadio"/>Custom Perspectives</label></div>
                
                <div id="custom_perspective">
                    <div class="row">
                        <input type="hidden" name="numberOfCustomPersectives" value="0" id="numberOfCustomPersectives"/>
                        <h3 style="text-align:center;font-size:18px;font-family:Georgia, 'Times New Roman', Times, serif;"> <b>The weights should add up to 100.</b></h3>
                        <div id="addingPerspective">
                        </div> 
                        <div style="float:right;"><button class="btn btn-info btn-sm" id="addingPerspectiveButton" type="button"><strong>Add Perspective</strong></button></div>               
                    </div><br />
                    
                </div>
                <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="row">
                                <div class="col-md-4"><a class="btn btn-danger btn-block btn-lg" role="button" href="/addingNewProramStep1"><i class="fa fa-backward"></i><strong>BACK</strong></a></div>
                                <div class="col-md-4"><button class="btn btn-warning btn-block btn-lg" role="button" type="reset"><i class="fa fa-refresh"></i><strong>RESET</strong></button></div>
                                <div class="col-md-4"><button class="btn btn-success btn-block btn-lg" type="submit"><strong>STEP 3</strong><i class="fa fa-forward"></i></button></div>
                            </div>
                        </div>
                    </div>

                    @foreach ($programDetailsArray as $programDetailsArray)
                    <input type="hidden" name="newProgramDetails[]" value="{{$programDetailsArray}}">
                    @endforeach
                    
                    

            </form>
        </div>
    </div>   
</div>

@endsection