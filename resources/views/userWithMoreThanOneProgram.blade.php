<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>isoTracking</title>
    <link rel="stylesheet" href="{{asset('design/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('design/assets/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('design/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('design/assets/css/untitled-1.css')}}">
    <link rel="stylesheet" href="{{asset('design/assets/css/untitled.css')}}">
</head>

<body>
    <h1 class="text-center"><strong>You Are Registered To Assess More Than One Program .&nbsp;</strong></h1>
    <h1 class="text-center"><strong>Click On The Proram To Be Redirected To.</strong></h1>

    @for ($i = 0; $i < count($programId); $i++)
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <a class="btn btn-success btn-block btn-lg" href = "{{"/home/".$programId[$i]}}" style="font-size:30px;"><strong>{{$programShortHand[$i]}}</strong></a>
        </div>
    </div>
    <br>
    <br>
    @endfor   

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <button class="btn btn-warning btn-block btn-md" type=""  style="font-size:20px;"><strong>GO BACK</strong></button>
        </div>
    </div>
</body>

</html>