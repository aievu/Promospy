<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Product;

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
}
