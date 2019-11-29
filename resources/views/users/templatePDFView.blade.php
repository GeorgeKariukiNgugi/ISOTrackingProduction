<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   <link rel="stylesheet" href="design/assets/bootstrap/css/bootstrap.min.css">
  <!-- Theme style -->
</head>
<body>
    <div class="container">            
            {{-- <div class="row">
                    <div class="col-lg-6 col-md-6"><img src="images/image012.jpg" style="align:left"alt="" width = "150px"class="responsive"></div>
                    <div class="col-lg-6 col-md-6"><img src="images/ems.jpg" style="align:right" alt="" width = "150px"class="responsive"></div>
                </div>          --}}

                <div class="row">
                        <div class="col-lg-6 col-md-6"><img src="images/image012.jpg" style /></div>
                        <div class="col-lg-6 col-md-6" style="float:right; text-align:right;"><img src="images/isms.png" style="width:150px;height:80px;" /></div>
                    </div>
            <i class="glyphicon glyphicon-ok" style="color:red;"></i>
            <div class="table-responsive" style="font-family:&#39;IM Fell Great Primer SC&#39;, serif;">
                
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Column 1</th>
                                <th>Column 2</th>
                                <th>Column 3</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 7; $i++)
                            @foreach ($data as $program)
                            <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$program->name}}</td>
                                    <td>{{$program->shortHand}}</td>
                                </tr>  
                            @endforeach 
                            @endfor                                       
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Summary 1</td>
                                <td>Summary 2</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
    </div>

</body>
</html>
