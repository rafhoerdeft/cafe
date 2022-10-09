@extends('errors::layout')

@section('title', 'Not Found')
@section('code', '404')
@section('message', 'Not Found')
@section('img', '404.png')
@section('content')
    <h1 class="display-1">
        <span class="text-primary">4</span><span class="text-danger">0</span><span class="text-success">4</span>
    </h1>
    <h2 class="font-weight-bold display-4">Lost in Space</h2>
    <p>You have reached the edge of the universe.
        <br>The page you requested could not be found.
        <br>Dont'worry and return to the previous page.
    </p>
@endsection
