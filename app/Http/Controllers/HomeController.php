<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderByDesc('created_at')->get();

        return view('website/home', compact('products'));
    }
}
