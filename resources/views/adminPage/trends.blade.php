@extends('extendingCode.adminExtending')
@section('charts')
{!! $trialCharts->script() !!}
{{-- {!! $ncsperProgramCharts->script() !!} --}}

@endsection
@section('section')

<div class="row" style="">
    <div class="col-md-10 col-md-offset-1">
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
</div>


@endsection