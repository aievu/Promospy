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
            'first_name' => 'required|regex:/^[a-zA-ZÀ-ÿ\s]+$/u|string|min:3|max:25',
            'last_name' => 'required|regex:/^[a-zA-ZÀ-ÿ\s]+$/u|string|min:3|max:25',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|string|min:8|confirmed|max:100',
            'password_confirmation' => 'required|string|min:8',
        ], [
            'first_name.regex' => 'Numbers or special characters are not accepted.',
            'last_name.regex' => 'Numbers or special characters are not accepted.',
        ]);

        $credentials['password'] = bcrypt($credentials['password']);

        User::create($credentials);

        return redirect()->route('login.index')->with('success', 'You have been registered successfully! Please login to continue.');
    }
}
