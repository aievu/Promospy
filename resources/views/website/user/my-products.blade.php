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
                        <a class="product-card-details-link" href="{{ route('product-details.index', $product->slug) }}">
                            <div>
                                <img style="opacity: 0.05" src="{{ $product->image_url }}" alt="{{ $product->name }}">
                            </div>
                        </a>
                        <div class="price-buy">
                            <p class="price">$ {{ number_format($product->price, 2) }}</p>
                        </div>
                        <a class="product-card-details-link-button" href="{{ route('product-details.index', $product->slug) }}"><p class="more-details">Click to view more details</p></a>
                    </div>
                    <div class="product-card-footer">
                        <div x-data="{ open: false }">
                            <div>
                                <button
                                    class="product-card-actions edit"
                                    @click="open = true"
                                >
                                    <i id="product-card-actions-icon" class="fa-regular fa-edit"></i><p>Edit</p>
                                </button>
                            </div>

                            <x-modal title="Edit product">
                                <form method="POST" action="{{ route('my-products.update', $product->id )}}" class="space-y-4">
                                    @csrf
                                    @method('PUT')

                                    <div>
                                        <label class="block mb-1">Name:</label>
                                        <input name="name" value="{{ $product->name }}" class="w-full border rounded-md px-3 py-2">
                                        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                                    </div>

                                    <div>
                                        <label class="block mb-1">Description:</label>
                                        <textarea class="w-full border rounded-md px-3 py-2 resize-none" type="text" name="description" id="description" maxlength="500" rows="2">{{ $product->description }}</textarea>
                                        @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                                    </div>

                                    <div>
                                        <label class="block mb-1">Sale URL:</label>
                                        <textarea class="w-full border rounded-md px-3 py-2 resize-none" type="text" id="sale-url" name="sale-url" maxlength="500" rows="2">{{ $product->sale_url }}</textarea>
                                        @error('sale-url') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                                    </div>

                                    <div>
                                        <label class="block mb-1">Img URL:</label>
                                        <textarea class="w-full border rounded-md px-3 py-2 resize-none" type="text" id="image-url" name="image-url" maxlength="500" rows="2">{{ $product->image_url }}</textarea>
                                        @error('image-url') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                                    </div>

                                    <div>
                                        <label class="block mb-1">Sold By:</label>
                                        <input class="w-full border rounded-md px-3 py-2" type="text" name="sold-by" maxlength="25" value="{{ $product->sold_by }}">
                                        @error('sold-by') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block mb-1" for="price">Price:</label>
                                            <input class="w-full border rounded-md px-3 py-2 price-input" id="price" name="price" maxlength="10" value="{{ $product->price }}">
                                            @error('price') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror 
                                        </div>
                                        
                                        <div>
                                            <label class="block mb-1" for="price">Category:</label>
                                            <select class="w-full border rounded-md px-3 py-2" id="category" value="{{ $product->category_id }}" name="category">
                                                <option value="">Select a Category</option>
                                                <option value="1" {{ $product->category_id == 1 ? 'selected' : '' }}>Eletronic</option>
                                                <option value="2" {{ $product->category_id == 2 ? 'selected' : '' }}>Fashion</option>
                                                <option value="3" {{ $product->category_id == 3 ? 'selected' : '' }}>Home and Decoration</option>
                                                <option value="4" {{ $product->category_id == 4 ? 'selected' : '' }}>Beauty and Self Care</option>
                                                <option value="5" {{ $product->category_id == 5 ? 'selected' : '' }}>Gift Card</option>
                                            </select>
                                            @error('category') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-end gap-2">
                                        <button type="submit"
                                            class="px-4 py-2 rounded-md bg-yellow-600 text-white hover:bg-yellow-700"
                                        >
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </x-modal>
                        </div>
                        <form action="{{ route('my-products.delete', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="product-card-actions delete">
                                <i id="product-card-actions-icon" class="fa-regular fa-trash-can"></i><p>Delete</p>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p>You have no products yet. <br> <a href="/publish">Make a publication </a></p>
            @endforelse
        </div>
    </div>
@endsection