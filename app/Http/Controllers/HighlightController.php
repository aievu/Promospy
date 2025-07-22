<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HighlightController extends Controller
{
    public function index() {
        $products = Product::withCount('highlight')->orderByDesc('highlight_count')->take(5)->get();

        return view('website/highlights', compact('products'));
    }
}
