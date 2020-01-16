@extends('extendingCode.adminExtending')
@section('section')
<h3 style="font-size:40px;font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;color:#4B94BF;"> <i class="fa fa-plus"></i> <span> ADDING A NEW PROGRAM. </span> <span><b style="font-size:40px;font-family:Verdana, Geneva, Tahoma, sans-serif"></b></span></h3>
<br>
<h4 style="font-size:30px;font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;">LAST STEP.</h4>
<div>
    <div class="row" style="font-size:25px;font-family:Georgia, 'Times New Roman', Times, serif;text-decoration:underline;">
        <div class="col-md-10 col-md-offset-1" style="color:#4c00ef;">
                 
                <h4 style="font-size:25px;font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;text-decoration: underline">{{$name. '   '. $progamShortHand. '   '.$progamCode}}</h4>           
            
                </div>
        </div>
    </div>
<br>

<div style="background-color:#D7E0EB;border-radius:50px;padding-top:5%;padding-bottom:5%" class="col-md-10 col-md-offset-1">
        <h4 style="font-size:25px;font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;"> Kindly Add The Assessor Of The Program.</h4>    
    <br>
        <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <h3 style="font-family:Georgia, 'Times New Roman', Times, serif;">Assessor Email:</h3>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <form action="/submittingEmailAddress" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="programId" value="{{$id}}">
                    <br>
                    <input type="text" class="form-control" name="email" required/></div>
                <div class="col-md-2 col-md-offset-5"><button class="btn btn-success btn-block btn-lg" type="submit"><strong>ADD ASESOR</strong></button></div>
                    </form>
            </div>
</div>
@endsection