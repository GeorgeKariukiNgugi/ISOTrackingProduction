@extends('extendingCode.adminExtending')
@section('section')

<div class="col-md-10 col-md-offset-1" style="margin-top:5%;font-family:'Times New Roman';padding-top:2%;padding-bottom:2%;border-radius:20px;background-color:#D7E0EB;">
        <div style="font-family:'Times New Roman';">
                <h1 class="text-center" style="font-family:'Times New Roman';">   <i class="fa fa-calendar"></i>Current Asesment Calender Tab.</h1>
            <div class="row" style="margin-left:30%;">
                <div class="col-md-3 ">
                    <h4 style="font-family:'Times New Roman';">Current Year:</h4>
                </div>
                <div class="col-md-2 ">
                    <h4  style="color:rgb(25,5,255);font-family:'Times New Roman';">{{$activeYaer}}</h4>
                </div>
            </div>
            <div class="row" style="margin-left:30%;">
                <div class="col-md-3">
                    <h4 style="font-family:'Times New Roman';">Current Quater:</h4>
                </div>
                <div class="col-md-2">
                    <h4 style="color:rgb(25,5,255);font-family:'Times New Roman';">{{ $activeQuater}}</h4>
                </div>
            </div>
            <div><br /><br /></div>
            <h1 class="text-center" style="font-family:Georgia, &#39;Times New Roman&#39;, Times, serif;">Change Assessment Period.</h1>
            <div id="errorThrowing"></div>
            <form action = "/submittingCalender" method="POST" id="submittingAsesingYear"> 

                @foreach ($errors->all() as $error)
        <div role="alert" class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span id="text">{{$error}}</div>
        @endforeach

                {{ csrf_field() }} 
                <div class="row" style="font-family:'Times New Roman';">
                    <div class="col-md-4 col-md-offset-1">
                        <h4 style="font-family:'Times New Roman';">Change Year:<span style="font-size:14px;color:rgb(255,0,0);font-family:times new roman;">*not compulsory to fill if in same year*</span>
                        <span style="color:blue;">Use Format: <b>2019/2020</b> </span></h4>
                    </div>
                    <div class="col-md-4 col-md-offset-1"><input type="text" id="year" name="year" placeholder="(e.g) 2019/2020" class="form-control" style="width:100%;height:30px;" /></div>
                </div>
                <div class="row" style="font-family:'Times New Roman';">
                    <div class="col-md-4 col-md-offset-1">
                        <h4 style="font-family:'Times New Roman';">Change Quarter :<span style="font-size:14px;color:rgb(255,0,0);font-family:times new roman;">*select from drop down.*</span></h4>
                    </div>
                    <div class="col-md-4 col-md-offset-1"><select required class="form-control" name="quater" style="width:100%;height:30px;font-size:14px;">
                    
                            {{-- <option>Quarter</option> --}}
                            <option value="Q1">Quarter 1</option>
                            <option value="Q2">Quarter 2</option>
                            <option value="Q3">Quarter 3</option>
                            <option value="Q4">Quarter 4</option>

                    </select></div>
                </div>
                <div><br /><br /></div>

                <div class="row" style="font-family:'Times New Roman';">
                    <div class="col-md-4 col-md-offset-1">
                        <h4 style="font-family:'Times New Roman';">Allow The Program Managers To Edit Their Matrices.</h4>
                    </div>
                    <div class="col-md-4 col-md-offset-1"><select required class="form-control" name="edit" style="width:100%;height:30px;font-size:14px;">

                            <option value="1">Yes</option>
                            <option value="0" selected>No</option>

                    </select></div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3" style="text-align:center;">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-0">
                                <div role="group" class="btn-group btn-group-lg"><button class="btn btn-warning" type="reset" style="font-size:14px;"><i class="glyphicon glyphicon-refresh"></i>RESET</button><button class="btn btn-success btn-lg" type="submit" style="font-size:14px;"><i class="fa fa-paper-plane"></i>SUBMIT</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection