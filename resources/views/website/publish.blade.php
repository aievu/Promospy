@vite(['resources/css/website/publish.css','resources/js/website/publish.js'])
@extends('layout/login-register-layout')
@section('title', 'Publish')

@section('content')
<a href="/"><-- Go Back</a>
    <h1>Publish your product</h1>
    <p>Here you can publish your product.</p>
    <div class="publish-content">
        <div class="publish-blocks">
            <div class="first-block">
                <form action="{{ route('publish.store') }}" method="POST" enctype="multipart/form-data">
                    @if (session('success'))
                        <div style="color: green; margin-top: 10px;">
                            {{ session('success') }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-content">
                        <label for="name">Product Name:</label>
                        <input type="text" id="name" name="name" maxlength="30" value="{{ old('name') }}">
                        @if($errors && $errors->has('name'))
                        <div style="color: red; margin-bottom: 10px;">
                                <span class="error-messages">{{ $errors->first('name') }}</span>
                            </div> 
                        @endif

                        <label for="description">Description:</label>
                        <textarea type="text" id="description" name="description" maxlength="100" rows="3">{{ old('description') }}</textarea>
                        @if($errors && $errors->has('description'))
                        <div style="color: red; margin-bottom: 10px;">
                                <span class="error-messages">{{ $errors->first('description') }}</span>
                            </div> 
                        @endif

                        <label for="sale-url">Sale URL:</label>
                        <textarea type="text" id="sale-url" name="sale-url" maxlength="500" rows="2">{{ old('sale-url') }}</textarea>
                        @if($errors && $errors->has('sale-url'))
                        <div style="color: red; margin-bottom: 10px;">
                                <span class="error-messages">{{ $errors->first('sale-url') }}</span>
                            </div> 
                        @endif

                        <label for="image-url">Image URL:</label>
                        <textarea type="text" id="image-url" name="image-url" maxlength="500" rows="2">{{ old('image-url') }}</textarea>
                        @if($errors && $errors->has('image-url'))
                        <div style="color: red; margin-bottom: 10px;">
                                <span class="error-messages">{{ $errors->first('image-url') }}</span>
                            </div> 
                        @endif

                        <label for="price">Price:</label>
                        <input class="form-price-input" id="price" name="price" value="{{ old('price') }}">
                        @if($errors && $errors->has('price'))
                        <div style="color: red; margin-bottom: 10px;">
                                <span class="error-messages">{{ $errors->first('price') }}</span>
                            </div> 
                        @endif
                    </div>
                    <button type="submit">Publish</button>
                </form>
            </div>
            <div class="second-block">
                <div class="product-card">
                    <div class="product-card-top">
                        <h3 id="preview-name"></h3>
                        <i id="product-card-favorite-icon" class="fa-regular fa-heart"></i>
                    </div>
                    <div class="product-card-body">
                        <img id="preview-image" src="" alt="Product Name">
                        <div class="price-buy">
                            <p id="preview-price" class="price">$ 0.00</p>
                            <a class="buy-button">Buy Now</a>
                        </div>
                        <p class="more-details">Click to view more details</p>
                    </div>
                    <div class="product-card-footer">
                        <div class="product-card-profile">
                            <i id="product-card-profile-icon" class="fa-regular fa-user"></i><p>{{ auth()->user()->first_name}}</p>
                        </div>
                        <p>{{now()->format('d/m/Y')}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="publish-help">
            <h2>What is a publication?</h2>
            <p>A publication is a product that you want to share with the community. You can add a name, description, sale URL, image URL, and price.</p>
            <h2>Why publish?</h2>
            <p>Publishing your product allows you to reach more potential buyers and increase your saler profile.</p>
            <h2>How to publish?</h2>
            <p>To publish your product, fill out the form with the required information and click the "Publish" button.</p>
        </div>
    </div>
@endsection