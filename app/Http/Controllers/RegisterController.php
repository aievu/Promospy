<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('website/user/register');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|min:3|max:150',
            'email' => 'required|email|max:150|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ], [
            'name.required' => 'Name is required.',
            'name.min' => 'Name must be at least 3 characters',
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'password.required' => 'Password is required.',
            'password_confirmation.required' => 'Confirm your password',
        ]);

        $credentials['password'] = bcrypt($credentials['password']);

        User::create($credentials);

        return redirect()->route('login.index')->with('success', 'You have been logged out.');
    }
}
