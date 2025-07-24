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
        <div class="my-products">
            <br>
            <h3>Products</h3>
            @isset($productsPostedCount)
                <p>Posted: {{ $productsPostedCount }}</p>
            @else
                <p>You have no products yet. <br> <a href="/publish">Make a publication </a></p>
            @endisset
            @isset($productsFavoritedCount)
                <p>Favorited: {{ $productsFavoritedCount }}</p>
            @else
                <p>You don't have any favorites yet.</p>
            @endisset
        </div>
        <br>
        <form action="{{ route('profile.delete') }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="delete-account-btn" type="submit">Delete Account</button>
        </form>
    </div>
@endsection