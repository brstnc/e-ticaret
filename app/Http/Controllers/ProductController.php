<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($slug_product_name)
    {
        $product = Product::whereSlug($slug_product_name)->firstOrFail();
        $categories = $product->categories()->distinct()->get();

        return view('product', compact('product', 'categories'));
    }

    public function search()
    {
        $call = request()->input('call');
        $products = Product::where('product_name', 'like', "%$call%")
            ->orWhere('comment', 'like', "%$call%")
            ->get();

        return view('search', compact('products'));
    }
}
