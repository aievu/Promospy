<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($name)
    {
        $category = Category::where('name', $name)->first();

        $products = $category->products()->orderByDesc('created_at')->get();

        return view ('website/product-category', compact('category', 'products'));
    }
}
