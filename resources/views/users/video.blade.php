@extends('extendingCode.usersExtending')
@section('navigationBar')

<li>
    <a href="/home">
      <i class="fa fa-address-card"></i>
    </a>
</li> 


<li>            
    <a href="{{"/dashBoard/".$id}}" ata-toggle="tooltip" title="DashBoard.">
      <i class="fa fa-dashboard"></i>              
    </a>
  </li> 
@endsection
@section('video')
<a href="{{"/usersTutorial/".$id}}"><i class="fa fa-video-camera"></i> <span>Video Sample</span></a>
@endsection
@section('overdue')
<a href="{{"/nonconformities/".$id."/1"}}" data-toggle="tooltip" title=" Non-conformities out of date">
@endsection

@section('inProgress')
<a href="{{"/nonconformities/".$id."/0"}}" data-toggle="tooltip" title="Non Conformies In Proress.">
@endsection

@section('closed')
<a href="{{"/nonconformities/".$id."/2"}}" data-toggle="tooltip" title="Closed Non Confrmities.">
@endsection
@section('section')

<div class="container">
    <div class="row" style="height:100vh;">
        <div class="col-md-10 col-md-offset-1" style="height:75vh;">
            <video controls style="width:100%;height:75vh;" src="{{asset('video/userVideo.mp4')}}"></video>
        </div>
    </div>
</div>

@endsection