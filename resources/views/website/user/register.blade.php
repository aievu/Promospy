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
                <div class="user-name-content">
                    <div>
                        <label for="first_name">First Name:</label>
                        <input type="text" id="first_name" name="first_name" maxlength="20" value="{{ old('first_name') }}">
                        @if($errors && $errors->has('first_name'))
                            <div style="color: red; margin-bottom: 10px; max-width: 244px;">
                                <span class="error-messages">{{ $errors->first('first_name') }}</span>
                            </div>
                        @endif
                    </div>
                
                    <div>
                        <label for="last_name">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" maxlength="20" value="{{ old('last_name') }}">
                        @if($errors && $errors->has('last_name'))
                            <div style="color: red; margin-bottom: 10px; max-width: 244px;">
                                <span class="error-messages">{{ $errors->first('last_name') }}</span>
                            </div>
                        @endif
                    </div>
                </div>

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