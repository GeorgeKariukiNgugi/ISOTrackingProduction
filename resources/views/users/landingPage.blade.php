@extends('extendingCode.usersExtending')
@section('section')

@php   
    $name = str_replace('_', ' ', $programName);
    $name = ucwords($name);
@endphp
<div style="margin-bottom:5%;margin-top:5%"id="heading">
<h1 class="text-center" style="font-family:Times New Roman;">Welcome To Safaricom {{$name}}</h1>
    <h1 class="text-center" style="font-family:Times New Roman;">({{$programShortHand}})</h1>
    <h2 class="text-center" style="font-family:Times New Roman;">Update the quaterly Scores based on the perspectives that have been listed below :-</h2>
</div>
    {{-- {{$perspectives}} --}}
    
@foreach ($perspectives as $perspective)
    {{-- {{$perspective->name}} --}}
@endforeach

@endsection