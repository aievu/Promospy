<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class MyProductsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $products = Product::where('user_id', $user->id)->orderByDesc('created_at')->get();

        return view('website/user/my-products', compact('products'));
    }

    public function update($id) {
        $product = Product::findOrFail($id);

        if ($product->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Yu do not have permission to update this product.');
        }

        return view('website/user/my-products');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        if ($product->user_id !== Auth::id()) {
            return redirect()->back()->with('error', ' You do not have permision to delete this product.');
        }

        $product->delete();

        return redirect()->route('my-products.index')->with('success', 'Product deleted successfully!');
    }
}
