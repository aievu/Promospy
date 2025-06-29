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
                <input type="text" id="name" name="name" required>
                @if($errors && $errors->has('name'))
                    <div style="color: red; margin-bottom: 10px;">
                        {{ $errors->first('name') }}
                    </div>
                @endif

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
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

                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                @if($errors && $errors->has('password_confirmation'))
                    <div style="color: red; margin-bottom: 10px;">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @endif
            </div>
             @if(session('error'))
                <div style="color: red; margin-bottom: 10px;">
                    {{ session('error') }}
                </div>
            @endif
            <button type="submit">Register</button>
        </form>
    </div>
@endsection