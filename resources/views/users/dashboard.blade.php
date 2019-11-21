@extends('extendingCode.usersExtending')
@section('charts')
{!! $chart->script() !!}
@endsection
@section('section')
{!! $chart->container() !!}

{{$id."coe."}}
@endsection