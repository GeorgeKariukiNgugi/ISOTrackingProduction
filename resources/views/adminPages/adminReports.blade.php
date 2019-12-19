@extends('extendingCode.adminExtending')
@section('section')

<h1 style="font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;"> <i class="fa fa-book"></i>  Downloaded Reports  Tab. </h1>
<div class="col-xs-12">
        <div class="box box-solid box-success">
          <div class="box-header " style="text-align:center;">
            <h3 class="box-title" style="font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;">Downloaded Reports.</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                <th>S<sub>no</sub></th>
                <th>Program</th>
                <th>Year</th>
                <th>Quater</th>
                <th>Report In PDF Format.</th>
              </tr>
@php
    $increment = 0;
@endphp

              @if (count($reports) == 0)
                  <h3 style="text-align:center;font-family:'Times New Roman', Times, serif;color:red"> You Have Not Yet Downloaded Any Reports Kindly Go To The Dashboard And Download If You Have Finished Assesing Your Program For This Quater.</h3>
              @endif
              @foreach ($reports as $report)
              <tr>
              <td>{{$increment}}</td>
              <td>{{$programNamesArray[$increment]}}</td>
              <td>{{$report->year}}</td>
              <td>{{$report->quater}}</td>
              <td> <a href="/{{$report->reportLocation}}"> Click To Download The Report.</a> </td>
            </tr> 

            @php
                $increment++;
            @endphp
              @endforeach
            </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    
@endsection