@extends('landing.layouts.app')

@section('content')
    @livewire('landing.home.carousel')
    @livewire('landing.home.menu-category')
    @livewire('landing.home.best-seller')
    @livewire('landing.home.popular-menu')
    @livewire('landing.home.latest-blog')
@endsection
