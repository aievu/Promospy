@vite(['resources/css/website/user/profile.css', 'resources/js/website/user/profile.js'])
@extends('layout/website-layout')
@section('title', 'Promospy - Profile')

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
            <div class="my-products-top">
                <h3>Products</h3>
                @isset($productsPostedCount)
                    <p>Posted: {{ $productsPostedCount }}</p>
                @endisset
            </div>
            <div class="product-content">
                @forelse ($myProducts as $product)
                    
                        <div class="product-card">
                            <a href="{{ route('product-details.index', $product->slug)}}">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                            </a>
                            <div class="product-informations">
                                <p style="font-weight: bold">{{ $product->name }}</p>
                                <p><span style="font-weight: bold">$ </span>{{ $product->price }}</p>
                                <p><span style="font-weight: bold">Posted on: </span>{{ $product->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    
                @empty
                    <p>You have no products yet. <br> <a href="/publish">Make a publication </a></p>
                @endforelse
            </div>
        </div>
        <form action="{{ route('profile.delete') }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="delete-account-btn" type="submit">Delete Account</button>
        </form>
    </div>
@endsection