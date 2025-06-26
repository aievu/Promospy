@vite(['resources/css/website/home.css'])
@extends('layout/website-layout')
@section('title', 'Home')

@component('components/header')
@endcomponent

@section('content')
    <h1>Welcome to the Promospy's home page</h1>
    <p>This is your best website for sales.</p>
    <div class="home-content">
        <div class="product-content">
            @foreach ($products as $product)
                <div class="product-card">
                    <i id="favorite-icon" class="fa-regular fa-heart"></i>
                    <div class="product-card-top">
                        <h2>{{ $product->name }}</h2>
                    </div>
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    <p>{{ $product->description }}</p>
                    <p>Price: ${{ number_format($product->price, 2) }}</p>
                    <a href="{{ $product->sale_url }}" class="buy-button">Buy Now</a>
                    <div class="product-card-footer">
                        <div class="product-card-profile">
                            <p><i id="product-card-profile-icon" class="fa-regular fa-user"></i>Humberto</p>
                        </div>
                        <p>{{ $product->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
