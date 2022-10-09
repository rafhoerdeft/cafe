@extends('errors::layout')

@section('title', 'Internal Server Error')
@section('code', '500')
@section('message', 'Internal Server Error')
@section('img', '500.png')
@section('content')
    <h1 class="display-1">
        <span class="text-warning">5</span><span class="text-danger">0</span><span class="text-primary">0</span>
    </h1>
    <h2 class="font-weight-bold display-4">Sorry, unexpected error</h2>
    <p>Looks like you are lost!
        <br>May be you are not connected to the internet!
    </p>
@endsection
