@extends('extendingCode.adminMain')
@section('charts')

{!! $chart->script() !!}
{!! $usersChart->script() !!}
@endsection