@vite('resources/css/website/product-details.css')
@extends('layout/website-layout')
@section('title', 'Promospy - ' . $product->name)

@include('components/header')
@if(auth()->check() && auth()->user()->hasRule('admin'))
    @include('components/admin-header')
@endif

@section('content')
    <div class="product-details-content">
        <div class="product-details">
            <div class="product-main">
                <div class="product-top">
                    <h2>{{ $product->name}}</h2>
                    <div class="product-top-right">
                        <div class="product-category" style="background-color:{{ $product->category_color}};">
                            <p class="label-category">{!! $product->category_label!!}</p>
                        </div>
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
                </div>
                <p>{{ $product->created_at->format('d/m/Y') }}</p>
                <div class="product-informations">
                    <div class="first-block">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    </div>
                    <div class="second-block">
                        <div class="product-reviews">
                            @if(session('error'))
                                <div style="color: red; margin-bottom: 10px;">
                                    <span class="error-messages">{{ session('error') }}</span>
                                </div>
                            @endif
                            <div class="comments">
                                @forelse ($product->lastComments as $comment)
                                    <p><i id="product-profile-icon" class="fa-regular fa-user"></i><span style="color: rgb(209, 136, 0)">{{ $comment->user->first_name }}:</span>{{ $comment->comment }}</p>
                                @empty
                                    <p>No comments on this product yet.</p>
                                @endforelse
                                <form action="{{ route('product-details.comment', ['slug' => $product->slug, 'productId' => $product->id]) }}" method="POST">
                                    @csrf
                                    <textarea name="comment" rows="2" maxlength="30" placeholder="Write a comment..."></textarea>
                                    <button type="submit"><i class="fa-regular fa-circle-right"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-price-buy">
                                <p>$ {{ number_format($product->price, 2) }}</p>
                                <a class="product-buy" href="{{ $product->sale_url }}" target="_blank">Buy Now</a>
                            </div>
                        </div>
                        @can('view', $product)
                            <div class="product-owner-actions">
                            <button class="product-owner-actions">
                                <i id="product-card-actions-icon" class="fa-regular fa-edit"></i><p>Edit</p>
                            </button>
                            <form action="{{ route('my-products.delete', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="product-owner-actions">
                                    <i id="product-card-actions-icon" class="fa-regular fa-trash-can"></i><p>Delete</p>
                                </button>
                            </form>
                        </div>
                        @else
                            <div class="product-footer">
                                <div class="product-profile">
                                    <i id="product-profile-icon" class="fa-regular fa-user"></i><p>{{ $product->user->first_name }}</p>
                                </div>
                                <p>Joined: {{ $product->user->created_at->format('M/Y') }}</p>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="product-description">
                <p>{{ $product->description }}</p>
            </div>
        </div>
        <div class="more-products">
            @forelse ($relatedProducts as $product)
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
                <p>There are no more products in this category.</p>
            @endforelse
        </div>
    </div>
@endsection