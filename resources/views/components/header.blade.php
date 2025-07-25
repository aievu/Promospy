@vite(['resources/css/components/header.css'])

<div class="header">
    <div>
        <a href="/">
            <img src="{{ asset('promospy.png') }}" alt="Promospy">
        </a>
    </div>
    <div class="header-links">
        <a class="publish-link" href="{{ route('publish.index') }}">Publish</a>
        <a class="highlights-link" href="{{ route('highlights.index') }}">Highlights</a>
    </div>
    <div class="header-user">
        <ul>
            @if(auth()->check())
                <li><a href="{{ route('favorites.index') }}">Favorites</a></li>
                <li><a href="{{ route('my-products.index') }}">My Products</a></li>
                <li><a href="{{ route('profile.index') }}">Profile</a></li>
                <li><a href="{{ route('login.logout') }}">Log out <i class="fa fa-sign-out"></i></a></li>
            @endif
            <li>
                @if(auth()->check())
                   <a class="header-user-button">
                       <p style="color: brown">Hello, {{ auth()->user()->first_name }}</p>
                       <div class="header-user-icon"><i class="fa-regular fa-user"></i></div>
                   </a>
               @else
                   <a href="{{ route('login.index')}}" class="header-user-button">
                       <p>Login</p>
                       <div class="header-user-icon"><i class="fa-regular fa-user"></i></div>
                   </a>
               @endif                
            </li>
        </ul>
    </div>
</div>