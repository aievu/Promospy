@vite(['resources/css/website/user/my-products.css', 'resources/js/website/user/my-products.js'])
@extends('layout/website-layout')
@section('title', 'Promospy - My Products')

@include('components/header')
@if(auth()->check() && auth()->user()->hasRule('admin'))
    @include('components/admin-header')
@endif

@section('content')
    <h1>Welcome to your products page</h1>
    <p>Here you can see your products.</p>
    <div class="my-products-content">
        <div class="product-content">
            @forelse ($products as $product)
                <div class="product-card">
                    <div class="product-card-top">
                        <h3>{{ $product->name }}</h3>
                    </div>
                    <div class="product-card-body">
                        <div class="category" style="background-color:{{ $product->category_color}};">
                            <p class="label-category">{!! $product->category_label!!}</p>
                        </div>
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                        <div class="price-buy">
                            <p class="price">$ {{ number_format($product->price, 2) }}</p>
                        </div>
                        <p class="more-details">Click to view more details</p>
                    </div>
                    <div class="product-card-footer">
                            <button id="openEditModalBtn" class="product-card-actions edit">
                                <i id="product-card-actions-icon" class="fa-regular fa-edit"></i><p>Edit</p>
                            </button>
                        </form>
                        <form action="{{ route('my-products.delete', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="product-card-actions delete">
                                <i id="product-card-actions-icon" class="fa-regular fa-trash-can"></i><p>Delete</p>
                            </button>
                        </form>
                    </div>
                </div>
                @include('components/edit-product-modal')
            @empty
                <p>You have no products yet. <br> <a href="/publish">Make a publication </a></p>
            @endforelse
        </div>
    </div>
@endsection