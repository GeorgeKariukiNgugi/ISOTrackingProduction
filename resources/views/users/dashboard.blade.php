@extends('extendingCode.usersExtending')
@section('navigationBar')

<li>
    <a href="/home">
      <i class="fa fa-address-card"></i>
    </a>
</li> 


<li>            
    <a href="{{"/home"}}">
      <i class="fa fa-dashboard"></i>              
    </a>
  </li> 
  <li >            
      <a href="/" data-toggle="tooltip" title=" Non-conformities out of date">
        <i class="fa fa-bell" style="color:rgb(255,215,6);"></i>
      </a>
    </li>    
    <li>            
        <a href="/" data-toggle="tooltip" title="All Non Conformities.">
          <i class="fa fa-flag" style="color:rgb(255,0,0);"></i>
        </a>
      </li>
@endsection

@section('charts')
{!! $chart->script() !!}
@for ($i = 0; $i < count($charts); $i++)
{!! $charts[$i]->script() !!}
@endfor
@endsection

@section('section')
<div class="box box-danger">
        <div class="box-header with-border text-center" >
          <h3 class="box-title">FINAL SCORES. <span style="font-size:33px: color:black;"><b>{{$finalScore}}</b></span></h3>
        </div>
        <div class="box-body">
                {!! $chart->container() !!}
        </div>
        <!-- /.box-body -->
      </div>
    @for ($i = 0; $i < count($charts); $i++)
        <div class="col-md-6">
    <div class="box box-solid">
      <div class="box-header with-border text-center" >
        <i class="fa fa-text-width"></i>

        <h3 class="box-title text-center">
            @php
                 $name = str_replace('_', ' ', $proramPersspectives[$i]->name);
                 $name = ucwords($name);
            @endphp
            {{$name}}
        </h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        {!! $charts[$i]->container() !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
    @endfor
{{$id."coe."}}
@endsection