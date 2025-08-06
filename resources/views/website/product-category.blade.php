@vite('resources/css/website/product-category.css')
@extends('layout/website-layout')
@section('title', 'Promospy - Product Category')

@include('components/header')

@section('content')
    <h1>This is the {{ $category->name}} Category</h1>
    <p>{{ $category->description }}</p>
    <div class="product-category-content">
        <div class="product-content">
            @forelse ($products as $product)
                <div style="opacity: 50%;" class="product-card">
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
                        @can('delete', $product)
                            <form class="product-card-admin-actions" action="{{ route('home.delete', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="product-card-actions delete">
                                    <i id="product-card-actions-icon" class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        @endcan
                        <a class="product-card-details-link" href="{{ route('product-details.index', $product->slug) }}">
                            <div>
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                            </div>
                        </a>
                        <div class="price-buy">
                            <p class="price">$ {{ number_format($product->price, 2) }}</p>
                            <a href="{{ $product->sale_url }}" target="_blank" class="buy-button">Buy Now</a>
                        </div>
                        <a class="product-card-details-link-button" href="{{ route('product-details.index', $product->slug) }}"><p class="more-details">Click to view more details</p></a>
                    </div>
                    <div class="product-card-footer">
                        <div class="product-card-profile">
                            <i id="product-card-profile-icon" class="fa-regular fa-user"></i><p>{{ $product->user->first_name }}</p>
                        </div>
                        <p>{{ $product->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            @empty
                <p>No products for this category publish yet.</p>
            @endforelse
        </div>
    </div>
@endsection