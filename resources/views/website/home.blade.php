@extends('layout/website-layout')
@section('title', 'Home')

@component('components/header')
@endcomponent

@section('content')
    <h1>Welcome to the Promospy's home page</h1>
    <p>This is your best website for sales.</p>
    <div class="home-content">
        ...
    </div>
@endsection
