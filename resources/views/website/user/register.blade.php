@vite('resources/css/website/user/register.css')
@extends('layout/login-register-layout')
@section('title', 'Resgister')

@section('content')
    <a href="/"><-- Go Back</a>
    <h1>Welcome to the Promospy's register page</h1>
    <p>Here you can register your new account.</p>
    <div class="register-content">
        <form action="{{ route('register.register')}}" method="POST">
            @csrf
            <div class="form-content">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                @if($errors && $errors->has('name'))
                    <div style="color: red; margin-bottom: 10px;">
                        <span class="error-messages">{{ $errors->first('name') }}</span>
                    </div>
                @endif

                <label for="email">Email:</label>
                <input id="email" name="email" value="{{ old('email') }}">
                @if($errors && $errors->has('email'))
                    <div style="color: red; margin-bottom: 10px;">
                        <span class="error-messages">{{ $errors->first('email') }}</span>
                    </div>
                @endif

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" >
                @if($errors && $errors->has('password'))
                    <div style="color: red; margin-bottom: 10px;">
                        <span class="error-messages">{{ $errors->first('password') }}</span>
                    </div>
                @endif

                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
                @if($errors && $errors->has('password_confirmation'))
                    <div style="color: red; margin-bottom: 10px;">
                        <span class="error-messages">{{ $errors->first('password_confirmation') }}</span>
                    </div>
                @endif
            </div>
             @if(session('error'))
                <div style="color: red; margin-bottom: 10px;">
                    {{ session('error') }}
                </div>
            @endif
            <button type="submit">Register</button>
            <div class="form-footer">
                <div>
                    Already have an account? <a href="{{ route('login.index') }}">Click here</a>
                </div>
            </div>
        </form>
    </div>
@endsection