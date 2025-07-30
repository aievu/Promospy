@vite('resources/css/website/product-details.css')
@extends('layout/website-layout')
@section('title', 'Product Details')

@include('components/header')
@if(auth()->check() && auth()->user()->hasRule('admin'))
    @include('components/admin-header')
@endif

@section('content')
    <div class="product-details-content">
        <div class="product-details">
            <div class="product-main">
                <h2>{{ $product->name}}</h2>
                <div class="product-informations">
                    <div class="first-block">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    </div>
                    <div class="second-block">
                        <p>$ {{ number_format($product->price, 2) }}</p>
                        <a href="{{ $product->sale_url }}" target="_blank">Buy Now</a>
                        <div>
                            <i class="fa-regular fa-user"></i><p>{{ $product->user->first_name }}</p>
                        </div>
                        <p>{{ $product->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="product-description">
                <p>{{ $product->description }}</p>
            </div>
        </div>
        <div class="more-products">
            <div class="product-card">
                <div class="product-card-top">
                    <h3>{{ $product->name }}</h3>
                    <form action="{{ route('favorites.toggle', $product->id) }}" method="POST">
                        @csrf
                        <button style="background: none; border: none; cursor: pointer;">
                            @if(auth()->check() && auth()->user()->favorites->contains($product))
                                <i id="product-card-favorite-icon" class="fa-solid fa-heart"></i>
                            @else
                                <i id="product-card-favorite-icon" class="fa-regular fa-heart"></i>
                            @endif
                        </button>
                    </form>
                </div>
                <div class="product-card-body">
                    <div class="category" style="background-color:{{ $product->category_color}};">
                        <p class="label-category">{!! $product->category_label!!}</p>
                    </div>
                    <div>
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    </div>
                    <div class="price-buy">
                        <p class="price">$ {{ number_format($product->price, 2) }}</p>
                        <a href="{{ $product->sale_url }}" target="_blank" class="buy-button">Buy Now</a>
                    </div>
                    <p class="more-details">Click to view more details</p>
                </div>
                <div class="product-card-footer">
                    <div class="product-card-profile">
                        <i id="product-card-profile-icon" class="fa-regular fa-user"></i><p>{{ $product->user->first_name }}</p>
                    </div>
                    <p>{{ $product->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-card-top">
                    <h3>{{ $product->name }}</h3>
                    <form action="{{ route('favorites.toggle', $product->id) }}" method="POST">
                        @csrf
                        <button style="background: none; border: none; cursor: pointer;">
                            @if(auth()->check() && auth()->user()->favorites->contains($product))
                                <i id="product-card-favorite-icon" class="fa-solid fa-heart"></i>
                            @else
                                <i id="product-card-favorite-icon" class="fa-regular fa-heart"></i>
                            @endif
                        </button>
                    </form>
                </div>
                <div class="product-card-body">
                    <div class="category" style="background-color:{{ $product->category_color}};">
                        <p class="label-category">{!! $product->category_label!!}</p>
                    </div>
                    <div>
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    </div>
                    <div class="price-buy">
                        <p class="price">$ {{ number_format($product->price, 2) }}</p>
                        <a href="{{ $product->sale_url }}" target="_blank" class="buy-button">Buy Now</a>
                    </div>
                    <p class="more-details">Click to view more details</p>
                </div>
                <div class="product-card-footer">
                    <div class="product-card-profile">
                        <i id="product-card-profile-icon" class="fa-regular fa-user"></i><p>{{ $product->user->first_name }}</p>
                    </div>
                    <p>{{ $product->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection