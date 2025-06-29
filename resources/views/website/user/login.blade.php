@vite('resources/css/website/user/login.css')
@extends('layout/login-register-layout')
@section('title', 'Login')

@section('content')
    <a href="/"><-- Go Back</a>
    <h1>Welcome to the Promospy's login page</h1>
    <p>Here you can login with your account.</p>
    <div class="login-content">
        <form action="{{ route('loggingin')}}" method="POST">
            @csrf
            <div class="form-content">
                <label for="email">Email:</label>
                <input id="email" name="email" required>
                @if($errors && $errors->has('email'))
                    <div style="color: red; margin-bottom: 10px;">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                @if($errors && $errors->has('password'))
                    <div style="color: red; margin-bottom: 10px;">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>
            @if(session('error'))
                <div style="color: red; margin-bottom: 10px;">
                    {{ session('error') }}
                </div>
            @endif
            <button type="submit">Login</button>
            <div class="login-form-footer">
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