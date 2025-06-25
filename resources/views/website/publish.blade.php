@vite('resources/css/website/publish.css')
@extends('layout/login-register-layout')
@section('title', 'Publish')

@section('content')
<a href="/"><-- Go Back</a>
    <h1>Publish your product</h1>
    <p>Here you can publish your product.</p>
    <div class="publish-content">
        <form action="{{ route('publish.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-content">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" required>

                <label for="url-promocao">URL Promoção:</label>
                <input type="text" id="url-promocao" name="url-promocao" required>

                <label for="url-imagem">URL Imagem:</label>
                <input type="text" id="url-imagem" name="url-imagem" required>

                <label for="preco">Preço:</label>
                <input type="text" id="preco" name="preco" required>
            </div>
            <button type="submit">Publish</button>
        </form>
    </div>
@endsection