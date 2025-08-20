<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductDetailsController extends Controller
{
    public function index($slug)
    {
        $product = Product::where('slug', $slug)->with('lastComments.user')->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(3)->get();

        return view('website/product-details', compact('product', 'relatedProducts'));
    }

    public function comment(Request $request, $slug)
    {
        $comment = $request->validate([
            'comment' => 'required|max:150',
        ]);

        $product = Product::where('slug', $slug)->firstOrFail();

        $comment['product_id'] = $product->id;
        $comment['user_id'] = auth()->id();

        Comment::create($comment);

        return redirect()->back()->with('success', 'Comment posted!');
    }

    public function edit($product)
    {
        $this->authorize('view', $product);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {

        // dd($request);
        // Formating price
        $update = $request->all();
        $update['price'] = str_replace([',',],[''], $update['price']);
        $request->merge($update);

        $update = $request->validate([
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

        $update['slug'] = Str::slug($update['name']);
        $update['sale_url'] = $request->input('sale-url');
        $update['image_url'] = $request->input('image-url');
        $update['user_id'] = auth()->id();
        $update['category_id'] = $request->input('category');
        $update['sold_by'] = $request->input('sold-by');

        $product = Product::findOrFail($id);

        if ($product->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You do not have permission to update this product.');
        }

        $product->update($update);

        return redirect()->route('product-details.index', $product->slug)->with('success', 'Product updated successfully!');
    }
}
