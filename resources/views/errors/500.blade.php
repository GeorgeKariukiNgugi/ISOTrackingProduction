@extends('errors::minimal')

@section('title', __('Oooooooppppsss'))
@section('code', '500')
@section('message')
<p>Oooooooppppsss, An Error Has Occured, Kindly Inform The Administrator.</p>
<a href="/">Go Back</a>
@endsection

{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
