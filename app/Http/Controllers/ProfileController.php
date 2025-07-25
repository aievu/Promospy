<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $productsPostedCount = Product::where('user_id', $user->id)->count();

        return view('website/user/profile', compact('productsPostedCount'));
    }

    public function delete(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        if ($user == "") {
            return redirect()->back()->with('error', 'You must be logged to delete a account.');
        }

        $user->delete();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home.index')->with('success', 'Your account has been deleted.');
    }
}
