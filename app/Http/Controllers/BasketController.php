<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        return view('basket');
    }

    public static function add()
    {
        $product = Product::find(request('id'));
        Cart::add($product->id, $product->product_name, 1, $product->price);

        return redirect()->route('basket')->with('mesaj', 'Ürün sepete eklendi.');
    }
}
