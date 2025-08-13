<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::orderByDesc('created_at')->get();
        $categories = Category::all();

        return view('website/home', compact('products', 'categories'));
    }
}
