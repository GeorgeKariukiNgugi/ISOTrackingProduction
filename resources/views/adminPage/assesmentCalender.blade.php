@extends('extendingCode.adminExtending')
@section('section')

<div class="col-md-10 col-md-offset-1" style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;padding-top:2%;padding-bottom:2%;border-radius:20px;background-color:#D7E0EB;">
        <div style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                <h1 class="text-center" style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">   <i class="fa fa-calendar"></i>Current Asesment Calender Tab.</h1>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <h2 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Current Year:</h2>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <h2  style="color:rgb(25,5,255);font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">{{$activeYaer}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    <h2 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Current Quater:</h2>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <h2 style="color:rgb(25,5,255);font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">{{ $activeQuater}}</h2>
                </div>
            </div>
            <div><br /><br /></div>
            <h1 class="text-center" style="font-family:Georgia, &#39;Times New Roman&#39;, Times, serif;">Change Asesment Period.</h1>
            <form action = "/submittingCalender" method="POST"> 

                @foreach ($errors->all() as $error)
        <div role="alert" class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span id="text">{{$error}}</div>
        @endforeach

                {{ csrf_field() }} 
                <div class="row" style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                    <div class="col-md-4 col-md-offset-1">
                        <h2 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Change Year:<span style="font-size:16px;color:rgb(255,0,0);font-family:times new roman;">*not compulasory to fill if in same year*</span></h2>
                    </div>
                    <div class="col-md-4 col-md-offset-1"><input type="text" name="year" placeholder="(e.g) 2019/2020" class="form-control" style="width:100%;height:50px;" /></div>
                </div>
                <div class="row" style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                    <div class="col-md-4 col-md-offset-1">
                        <h2 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Change Quater :<span style="font-size:16px;color:rgb(255,0,0);font-family:times new roman;">*select from drop down.*</span></h2>
                    </div>
                    <div class="col-md-4 col-md-offset-1"><select required class="form-control" name="quater" style="width:100%;height:50px;font-size:20px;">
                    
                            {{-- <option>Quater</option> --}}
                            <option value="Q1">Quater 1</option>
                            <option value="Q2">Quater 2</option>
                            <option value="Q3">Quater 3</option>
                            <option value="Q4">Quater 4</option>

                    </select></div>
                </div>
                <div><br /><br /></div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3" style="text-align:center;">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-0">
                                <div role="group" class="btn-group btn-group-lg"><button class="btn btn-warning" type="reset" style="font-size:20PX;"><i class="glyphicon glyphicon-refresh"></i>RESET</button><button class="btn btn-success btn-lg" type="submit" style="font-size:20PX;"><i class="fa fa-paper-plane"></i>SUBMIT</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection