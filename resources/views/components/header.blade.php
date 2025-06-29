@vite(['resources/css/components/header.css'])

<div class="header">
    <div>
        <a href="/">
            <img src="{{ asset('promospy.png' )}}" alt="Promospy">
        </a>
    </div>
    <form>
        @csrf
        <input type="text" placeholder="Type what do you looking-for...">
        <button class="header-search-button" type="submit">Search</button>
    </form>
    <div class="header-links">
        <a class="publish-link" href="/publish">Publish</a>
        <a class="highlights-link" href="">Highlights</a>
    </div>
    @if(auth()->check())
        <a href="{{ route('login.logout')}}">Log out <i class="fa fa-sign-out"></i></a>
    @endif
    <div class="header-profile">
        <ul>
            @if(auth()->check())
            <li><a href="/favorites">Favorites</a></li>
            @endif
            <li>
                <a href="{{ route('login.index')}}" class="header-profile-button">
                     @if(auth()->check())
                        <p style="color: brown">Olá, {{ auth()->user()->name}}</p>
                    @else
                        <p>Login</p>
                    @endif
                    <div class="header-profile-icon"><i class="fa-regular fa-user"></i></div>
                </a>
            </li>
        </ul>
    </div>
</div>