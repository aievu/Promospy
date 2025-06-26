@vite(['resources/css/components/header.css'])

<div class="header">
    <div>
        <a href="/">
            <img src="{{ asset('promospy.png' )}}" alt="Promospy">
        </a>
    </div>
    <form {{--action="{{ route('enviarbanco.st') }}" method="POST" enctype="multipart/form-data"--}}>
        @csrf
        <input type="text" placeholder="Type what do you looking-for...">
        <button class="header-search-button" type="submit">Search</button>
    </form>
    <div class="header-links">
        <a class="publish-link" href="/publish">Publish</a>
        <a class="highlights-link" href="">Highlights</a>
    </div>
    <div class="header-profile">
        <ul>
            <li><a href="/favorites">Favorites</a></li>
            <li><button class="header-profile-button"><i class="fa-regular fa-user"></i></button></li>
        </ul>
    </div>
</div>