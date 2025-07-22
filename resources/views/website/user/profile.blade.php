@vite(['resources/css/website/user/profile.css', 'resources/js/website/user/profile.js'])
@extends('layout/website-layout')
@section('title', 'Profile')

@section('content')
    <a href="/"><-- Go Back</a>
    <h1>Welcome to your profile page</h1>
    <p>Here you can see your profile information.</p>
    <div class="profile-content">
        <div class="profile-info">
            <h2>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h2>
            <p>Email: {{ auth()->user()->email }}</p>
            <p>Joined: {{ auth()->user()->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
@endsection