@vite('resources/css/website/user/login.css')
@extends('layout/login-register-layout')
@section('title', 'Promospy - Login')

@section('content')
    <a href="/"><-- Go Back</a>
    <h1>Welcome to the Promospy's login page</h1>
    <p>Here you can login with your account.</p>
    <div class="login-content">
        <form action="{{ route('loggingin')}}" method="POST">
            @csrf
            <div class="form-content">
                <label for="email">Email:</label>
                <input class="form-input" id="email" name="email" value="{{ old('email')}}">
                @if($errors && $errors->has('email'))
                    <div style="color: red; margin-bottom: 10px;">
                        <span class="error-messages">{{ $errors->first('email') }}</span>
                    </div>
                @endif

                <label for="password">Password:</label>
                <input class="form-input" type="password" id="password" name="password">
                @if($errors && $errors->has('password'))
                    <div style="color: red; margin-bottom: 10px;">
                        <span class="error-messages">{{ $errors->first('password') }}</span>
                    </div>
                @endif
                <div class="form-remeber">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember</label>
                </div>
            </div>
            @if(session('error'))
                <div style="color: red; margin-bottom: 10px;">
                    <span class="error-messages">{{ session('error') }}</span>
                </div>
            @endif
            <button type="submit">Login</button>
            <div class="form-footer">
                <div>
                    Forgot your password? <a href="/">Click here</a>
                </div>
                <div>
                    Don't have an account? <a href="{{ route('register.index')}}">Register</a>
                </div>
            </div>
        </form>
    </div>
@endsection