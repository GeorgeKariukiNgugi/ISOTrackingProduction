@extends('extendingCode.adminExtending')
@section('charts')
{!! $ncsCharts->script() !!}
{!! $ncsperProgramCharts->script() !!}

@endsection
@section('section')
<h2 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;text-align:center;"> CUMMULATIVE PROGRAM SCORE SUMMARY FOR {{$activeYaer}}.</h2>
<br>
<div class="row">
    @for ($i = 0; $i < count($programScores); $i++)
    <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box" style="background-color:{{$programColors[$i]}};">
              <div class="inner">
                <h3>{{ sprintf("%.2f", $programScores[$i])."%"}}</h3>
      
                <h4 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif"> <b> {{$programShorthand[$i]}} </b></h4>
              </div>
              <div class="icon">
                <i class="fa  fa-trophy"></i>
              </div>
              <a href="{{"/programDashboard/".$programIds[$i]}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>  
    @endfor  
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="box box-danger">
              <div class="box-header with-border text-center" >
                <h3 class="box-title"> <span style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">GRAPHICAL REPRESENTATION OF NCs.</span></h3>
              </div>
              <div class="box-body">
                      {!! $ncsCharts->container() !!}
              </div>
              <!-- /.box-body -->
            </div>
      </div> 

      <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border text-center" >
              <h3 class="box-title"> <span style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">PRORAM ASSESMENT FOR: {{$activeQuater}} {{$activeYaer}}</span></h3>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover"style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif" style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
                  <thead>
                      <tr>
                          <th>Program</th>
                          <th>Assessed All KPIs??</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @for ($i = 0; $i < count($checkingIfAssesed); $i+=2)
                    <tr>
                        <td>{{$checkingIfAssesed[$i+1]}}</td>
                        <td>
                            @if ($checkingIfAssesed[$i] == 0)
                            {{"All Kpis  for ".$activeYaer.'  '.$activeQuater."Have Been Assessed."}}
                            <b><i class=" fa  fa-check" style="color:green;font-size:30px;"></i></b>
                            
                            @elseif($checkingIfAssesed[$i] == -1)
                            {{ "No Kpi  for ".$activeYaer.'  '.$activeQuater."Has Been Assessed ."}}
                            <b><i class=" fa fa-times" style="color:red;font-size:30px;"></i></b>
                            
                            @else
                              {{$checkingIfAssesed[$i]. "  KPIs  for ".$activeYaer.'  '.$activeQuater."Have Not Been Assessed."}}
                              <b><i class=" fa  fa-adjust" style="color:orange;font-size:30px;"></i></b>
                            @endif
                        </td>
                        <td> 
                          <a class="btn btn-success btn-sm" role="button" href="#"><i class="fa fa-send"></i><strong>Send Reminder Email.</strong></a>
                        </td>
                    </tr>
                    @endfor
                      
                  </tbody>
                  <tfoot>
                      <tr>
                          <td><strong>Program</strong><br /></td>
                          <td><strong>Assessed All KPIs??</strong><br /></td>
                          <td><strong>Actions</strong><br /></td>
                      </tr>
                  </tfoot>
              </table>
          </div>
        </div>
      </div>
    
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border text-center" >
              <h3 class="box-title"> <span style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">GRAPHICAL REPRESENTATION OF NCs PER PROGRAM.</span></h3>
            </div>
            <div class="box-body">
                    {!! $ncsperProgramCharts->container() !!}
            </div>
            <!-- /.box-body -->
          </div>
    </div>
      <div class="col-md-6">
              <div class="box box-danger">
                  <div class="box-header with-border text-center" >
                    <h3 class="box-title"> <span style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">TABULAR REPRESENTATION OF NCs.</span></h3>
                  </div>
                  <div class="box-body">
                          <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover" style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">
                                      <thead>
                                          <tr>
                                              <th>NC TYPE</th>
                                              <th> NUMBER</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td> <a href="/nonConformitiesAdmin/0/0">Closed NCs.</a></td>
                                              <td>{{$ncsArray[0]}}</td>
                                          </tr> 
                                          <tr>
                                                  <td>  <a href="/nonConformitiesAdmin/1/0">NCs In Progress.</a></td>
                                                  <td>{{ $ncsArray[1]}}</td>
                                              </tr> 
                                              <tr>
                                                      <td> <a href="/nonConformitiesAdmin/2/0">OverDue NCs</a></td>
                                                      <td>{{$ncsArray[2]}}</td>
                                                  </tr>                                           
                                      </tbody>
                                      <tfoot>
                                          <tr>
                                              <td>NC TYPE</td>
                                              <td>NUMBER</td>
                                          </tr>
                                      </tfoot>
                                  </table>
                              </div>
                  </div>
                  <!-- /.box-body -->
                </div>
          </div>
    </div>                  
@endsection
