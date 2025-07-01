@vite('resources/css/website/publish.css')
@extends('layout/login-register-layout')
@section('title', 'Publish')

@section('content')
<a href="/"><-- Go Back</a>
    <h1>Publish your product</h1>
    <p>Here you can publish your product.</p>
    <div class="publish-content">
        <form action="{{ route('publish.store') }}" method="POST" enctype="multipart/form-data">
            @if (session('success'))
                <div style="color: green; margin-top: 10px;">
                    {{ session('success') }}
                </div>
            @endif
            @csrf
            <div class="form-content">
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                @if($errors && $errors->has('name'))
                   <div style="color: red; margin-bottom: 10px;">
                        <span class="error-messages">{{ $errors->first('name') }}</span>
                    </div> 
                @endif

                <label for="description">Description:</label>
                <input type="text" id="description" name="description" value="{{ old('description') }}">
                @if($errors && $errors->has('description'))
                   <div style="color: red; margin-bottom: 10px;">
                        <span class="error-messages">{{ $errors->first('description') }}</span>
                    </div> 
                @endif

                <label for="sale-url">Sale URL:</label>
                <input type="text" id="sale-url" name="sale-url" value="{{ old('sale-url') }}">
                @if($errors && $errors->has('sale-url'))
                   <div style="color: red; margin-bottom: 10px;">
                        <span class="error-messages">{{ $errors->first('sale-url') }}</span>
                    </div> 
                @endif

                <label for="image-url">Image URL:</label>
                <input type="text" id="image-url" name="image-url" value="{{ old('image-url') }}">
                @if($errors && $errors->has('image-url'))
                   <div style="color: red; margin-bottom: 10px;">
                        <span class="error-messages">{{ $errors->first('image-url') }}</span>
                    </div> 
                @endif

                <label for="price">Price:</label>
                <input class="form-price-input" type="number" id="price" name="price" value="{{ old('price') }}">
                @if($errors && $errors->has('price'))
                   <div style="color: red; margin-bottom: 10px;">
                        <span class="error-messages">{{ $errors->first('price') }}</span>
                    </div> 
                @endif
            </div>
            <button type="submit">Publish</button>
        </form>
    </div>
@endsection