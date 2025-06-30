<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('website/user/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|string|max:100',
        ]);

        if(Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('home')->with('success', 'Login successful!');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home.index')->with('success', 'You have been logged out.');
    }
}
