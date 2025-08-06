<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductDetailsController extends Controller
{
    public function index($slug)
    {
        $product = Product::where('slug', $slug)->with('comments.user')->firstOrFail();

        return view('website/product-details', compact('product'));
    }

    public function comment(Request $request, $slug)
    {
        $comment = $request->validate([
            'comment' => 'required|max:150',
        ]);

        $product = Product::where('slug', $slug)->first();

        $comment['product_id'] = $product->id;
        $comment['user_id'] = auth()->id();

        Comment::create($comment);

        return redirect()->back()->with('success', 'Comment posted!');
    }
}
