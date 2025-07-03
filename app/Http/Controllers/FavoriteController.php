<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $favorites = $user->favorites()->orderByDesc('favorites.created_at')->get();

        return view('website/user/favorites', compact('favorites'));
    }

    public function toggle(Product $product)
    {
        $user = Auth::user();

        if($user->favorites()->where('product_id', $product->id)->exists()) {
            $user->favorites()->detach($product->id);
        } else {
            $user->favorites()->attach($product->id);
        }

        return back()->with('success', 'Updated favorite status.');
    }
}
