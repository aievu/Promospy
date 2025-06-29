<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class PublicationController extends Controller
{
    public function index()
    {
        return view('website/publish');
    }

    public function store(Request $request)
    {
        $product = $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'required|string|max:100',
            'sale-url' => 'required|url|max:500',
            'image-url' => 'required|url|max:500',
            'price' => 'required|numeric|min:0',
        ]);

        $product['slug'] = Str::slug($product['name']);
        $product['sale_url'] = $request->input('sale-url');
        $product['image_url'] = $request->input('image-url');
        $product['user_id'] = auth()->id();
        $product['category_id'] = 1;

        Product::create($product);

        return redirect()->route('publish.index')->with('success', 'Product published successfully!');
    }
}
