<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MyProductsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $products = Product::where('user_id', $user->id)->orderByDesc('created_at')->get();

        return view('website/user/my-products', compact('products'));
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

        return redirect()->route('my-products.index')->with('success', 'Product updated successfully!');
    }

    public function delete(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            return redirect()->back()->with('error', ' You do not have permision to delete this product.');
        }

        $product->delete();

        return redirect()->route('my-products.index')->with('success', 'Product deleted successfully!');
    }
}
