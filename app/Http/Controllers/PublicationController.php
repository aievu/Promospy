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
        // Formating price
        $product = $request->all();
        $product['price'] = str_replace([',',],[''], $product['price']);
        $request->merge($product);

        $product = $request->validate([
            'name' => 'required|string|max:30|min:3',
            'description' => 'required|string|max:240|min:10',
            'sale-url' => 'required|url|max:500',
            'image-url' => 'required|url|max:500',
            'price' => 'required|numeric|min:0.01|max:999999.99',
            'category' => 'required',
            'sold-by' => 'required|string|max:25',
        ], [
            'sale-url.required' => 'The Sale URL field is required.',
            'image-url.required' => 'The Image URL field is required.',
            'sold-by.required' => 'The Sold By field is required',
        ]);

        $product['slug'] = Str::slug($product['name']);
        $product['sale_url'] = $request->input('sale-url');
        $product['image_url'] = $request->input('image-url');
        $product['user_id'] = auth()->id();
        $product['category_id'] = $request->input('category');
        $product['sold_by'] = $request->input('sold-by');

        Product::create($product);

        return redirect()->route('publish.index')->with('success', 'Product published successfully!');
    }
}
