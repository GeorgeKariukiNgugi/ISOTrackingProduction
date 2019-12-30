@extends('extendingCode.adminExtending')
@section('charts')
{!! $trialCharts->script() !!}
{!! $usersChart->script() !!}

{{-- {!! $ncsperProgramCharts->script() !!} --}}

@endsection
@section('section')

<div class="row" style="">
    <div class="col-md-6">
      <div class="box box-danger">
          <div class="box-header with-border text-center" >
            <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">TRENDS PER PROGRAM PER QUATER PER YEAR.</span></h3>
          </div>
          <div class="box-body">
                  {!!$trialCharts->container()!!}
          </div>
          <!-- /.box-body -->
        </div>
  </div> 
  <div class="col-md-6">
    <div class="box box-danger">
        <div class="box-header with-border text-center" >
          <h3 class="box-title"> <span style="font-family:Georgia, 'Times New Roman', Times, serif">TRENDS PER PROGRAM PER QUATER PER YEAR.</span></h3>
        </div>
        <div class="box-body">
                {!!$usersChart->container()!!}
        </div>
        <!-- /.box-body -->
      </div>
</div> 
</div>


@endsection