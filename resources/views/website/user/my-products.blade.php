@vite('resources/css/website/user/my-products.css')
@extends('layout/website-layout')
@section('title', 'My Products')

@component('components/header')
@endcomponent

@section('content')
    <a href="/"><-- Go Back</a>
    <h1>Welcome to your products page</h1>
    <p>Here you can see your products.</p>
    <div class="my-products-content">
        @if($products->isEmpty())
            <p>You have no products yet. <a href="/publish">Make a publication </a></p>
        @else
            <div class="product-content">
                @foreach ($products as $product)
                    <div class="product-card">
                        <div class="product-card-top">
                            <h3>{{ $product->name }}</h3>
                            <i id="product-card-favorite-icon" class="fa-regular fa-heart"></i>
                        </div>
                        <div class="product-card-body">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                            <div class="price-buy">
                                <p class="price">$ {{ number_format($product->price, 2) }}</p>
                                <a class="buy-button">Buy Now</a>
                            </div>
                            <p class="more-details">Click to view more details</p>
                        </div>
                        <div class="product-card-footer">
                            <form action="" method="PUT">
                                @csrf
                                @method('UPDATE')
                                <button type="submit" class="product-card-actions edit">
                                    <i id="product-card-actions-icon" class="fa-regular fa-edit"></i><p>Edit</p>
                                </button>
                            </form>
                            <form action="{{ route('my-products.delete', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="product-card-actions delete">
                                    <i id="product-card-actions-icon" class="fa-regular fa-trash-can"></i><p>Delete</p>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection