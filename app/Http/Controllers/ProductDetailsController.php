<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductDetailsController extends Controller
{
    public function index($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('website/product-details', compact('product'));
    }
}
