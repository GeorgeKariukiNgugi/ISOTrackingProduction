@extends('extendingCode.adminExtending')
@section('charts')
{!! $ncsCharts->script() !!}
{!! $ncsperProgramCharts->script() !!}

@endsection
@section('section')
<h2 style="font-family:Georgia, 'Times New Roman', Times, serif;text-align:center;"> CUMMULATIVE PROGRAM SCORE SUMMARY FOR {{$activeYaer}}.</h2>
<br>
<div class="row">
    @for ($i = 0; $i < count($programScores); $i++)
    <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box" style="background-color:{{$programColors[$i]}};">
              <div class="inner">
                <h3>{{ sprintf("%.2f", $programScores[$i])."%"}}</h3>
      
                <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;"> <b> {{$programShorthand[$i]}} </b></h4>
              </div>
              <div class="icon">
                <i class="fa  fa-trophy"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>  
    @endfor  
      </div>

      <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border text-center" >
                  <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">GRAPHICAL REPRESENTATION OF NCs.</span></h3>
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
                <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">GRAPHICAL REPRESENTATION OF NCs PER PROGRAM.</span></h3>
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
                      <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">TABULAR REPRESENTATION OF NCs.</span></h3>
                    </div>
                    <div class="box-body">
                            <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" style="font-family:Georgia, 'Times New Roman', Times, serif">
                                        <thead>
                                            <tr>
                                                <th>NC TYPE</th>
                                                <th> NUMBER</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> <a href="#">Closed NCs.</a></td>
                                                <td>{{$ncsArray[0]}}</td>
                                            </tr> 
                                            <tr>
                                                    <td>  <a href="#">NCs In Progress.</a></td>
                                                    <td>{{ $ncsArray[1]}}</td>
                                                </tr> 
                                                <tr>
                                                        <td> <a href="#">OverDue NCs</a></td>
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
            <div class="col-md-6">
              <div class="box box-danger">
                  <div class="box-header with-border text-center" >
                    <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">PRORAM ASSESMENT FOR: {{$activeQuater}} {{$activeYaer}}</span></h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover"style="font-family:Georgia, 'Times New Roman', Times, serif" style="font-family:Georgia, 'Times New Roman', Times, serif">
                        <thead>
                            <tr>
                                <th>Program</th>
                                <th>Assesed All KPIs??</th>
                            </tr>
                        </thead>
                        <tbody>
                          @for ($i = 0; $i < count($checkingIfAssesed); $i+=2)
                          <tr>
                              <td>{{$checkingIfAssesed[$i+1]}}</td>
                              <td>
                                  @if ($checkingIfAssesed[$i] == 0)
                                  {{"All Kpis Have Been Assesed."}}
                                  <b><i class=" fa  fa-check" style="color:green;font-size:30px;"></i></b>
                                  
                                  @elseif($checkingIfAssesed[$i] == -1)
                                  {{ "No Kpi Has Been Assesed ."}}
                                  <b><i class=" fa fa-times" style="color:red;font-size:30px;"></i></b>
                                  
                                  @else{
                                    {{$checkingIfAssesed[$i]. "  KPIs Have Not Been Assesed."}}
                                    <b><i class=" fa  fa-adjust" style="color:orange;font-size:30px;"></i></b>
                                    
                                  }
                                  @endif
                              </td>
                          </tr>
                          @endfor
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><strong>Program</strong><br /></td>
                                <td><strong>Assesed All KPIs??</strong><br /></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
              </div>
            </div>
            
@endsection
