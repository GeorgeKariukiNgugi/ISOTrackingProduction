@extends('extendingCode.adminExtending')
@section('section')
<h3 style="font-size:40px;font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;color:#4B94BF;"> <i class="fa fa-plus"></i> <span> ADDING A NEW PROGRAM. </span> <span><b style="font-size:40px;font-family:Verdana, Geneva, Tahoma, sans-serif"></b></span></h3>
<br>
<h4 style="font-size:30px;font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;">Adding A New Program Takes 3 Easy steps: </h4>
<br>
<ol style="font-size:20px;font-family:Georgia, 'Times New Roman', Times, serif;margin-left:35%;"> 
        <li>Defining The Program Details. (i.e) Name, program Code, e.t.c </li>
        <br>
        <li> Defining The Program Perspectives.</li>
        <br>
        <li>Adding The Assesors Details.</li> 
        <br>   
    </ol>

    <br>

    <div>
            <div class="row">
                    <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4"><a class="btn btn-success btn-block btn-lg " role="button" href="/addingNewProramStep1" style="background-color:#00A65A;font-size:22px;border-radius:20px;"><strong>Move To Step 1</strong> <span>   </span><i class="fa fa-forward"></i></a></div>
                </div>
    </div>
@endsection