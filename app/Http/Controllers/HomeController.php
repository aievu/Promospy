<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{

    use AuthorizesRequests;

    public function index()
    {
        $products = Product::orderByDesc('created_at')->get();
        $categories = Category::all();

        return view('website/home', compact('products', 'categories'));
    }

    public function delete(Product $product)
    {
        $this->authorize('delete', $product);

        $product->delete();

        return redirect()->route('home.index')->with('success', 'Product deleted successfully!');
    }
}
