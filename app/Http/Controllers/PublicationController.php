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
            'name' => 'required|string|max:150',
            'description' => 'required|string|max:500',
            'sale-url' => 'required|url|max:500',
            'image-url' => 'required|url|max:500',
            'price' => 'required|numeric|min:0',
        ]);

        $product['name'] = $request->input('name');
        $product['description'] = $request->input('description');
        $product['slug'] = Str::slug($product['name']);
        $product['sale_url'] = $request->input('sale-url');
        $product['image_url'] = $request->input('image-url');
        $product['price'] = $request->input('price');
        $product['user_id'] = auth()->id();
        $product['category_id'] = 1;

        // Assuming you have a Product model to handle the database interaction
        Product::create($product);

        return redirect()->route('publish.index')->with('success', 'Product published successfully!');
    }
}
