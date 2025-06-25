@vite(['resources/css/components/header.css'])

<div class="header">
    <div>
        <h1><a href="/">Promospy</a></h1>
        {{-- <img src="" alt=""> --}}
    </div>
    <form {{--action="{{ route('enviarbanco.st') }}" method="POST" enctype="multipart/form-data"--}}>
        @csrf
        <input type="text" placeholder="Type what do you looking-for...">
        <button type="submit">Search</button>
    </form>
    <div class="header-functions">
        <ul>
            <li><a class="publish-link" href="/publish">Publish</a></li>
            <li><a href="">Highlights</a></li>
            <li><a href="/favorites">Favorites</a></li>
            <li><a href="">My Profile</a></li>
        </ul>
    </div>
</div>