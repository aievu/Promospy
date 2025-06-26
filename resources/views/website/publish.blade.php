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
                <div style="color: green; margin-bottom: 10px;">
                    {{ session('success') }}
                </div>
            @endif
            @csrf
            <div class="form-content">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="description">Description:</label>
                <input type="text" id="description" name="description" required>

                <label for="sale-url">Sale URL:</label>
                <input type="text" id="sale-url" name="sale-url" required>

                <label for="image-url">Image URL:</label>
                <input type="text" id="image-url" name="image-url" required>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>
            </div>
            <button type="submit">Publish</button>
        </form>
    </div>
@endsection