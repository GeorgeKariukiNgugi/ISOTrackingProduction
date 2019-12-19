<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>isoTracking</title>
    <link rel="stylesheet" href="design/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="design/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="design/assets/css/styles.css">
</head>

<body style="background-color:#ECF0F5;">
    <div id="forbiddendiv">
        <h1 class="text-center"><i class="fa fa-warning"></i><strong>You are forbidden from accessing this site.</strong></h1>
        <h2 class="text-center">Kindly Contact The Admin to verify Your Account.</h2>
        <a class="btn btn-danger btn-lg" role="button" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         <i class="fa fa-backward"></i><strong>&nbsp; GO BACK.</strong></a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form></div>
    <script src="design/assets/js/jquery.min.js"></script>
    <script src="design/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
