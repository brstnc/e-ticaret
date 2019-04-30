<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Basket_Product;
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
        $details = $product->detail;
        $cartItem = Cart::add($product->id, $product->product_name, 1, $product->price, ['slug' => $product->slug, 'img' => $details->product_img]);

        if (auth()->check()) {
             $basket_id = session('basket_id');
             if (!isset($basket_id)) {
                $basket = Basket::create([
                    'user_id' => auth()->id()
                ]);
                $basket_id = $basket->id;
                session()->put('basket_id', $basket_id);
             }

             Basket_Product::updateOrCreate(
                 ['basket_id' => $basket_id, 'product_id' => $product->id],
                 ['amount' => $cartItem->qty, 'piece' => $product->price, 'status' => 'Beklemede']
             );
        }
        return redirect()->route('basket')->with('mesaj', 'Ürün sepete eklendi.');
    }
    public function delete($rowId)
    {
        if (auth()->check()) {
            $basket_id = session('basket_id');
            $cartItem = Cart::get($rowId);
            Basket_Product::where('basket_id', $basket_id)->where('product_id', $cartItem->id)->delete();
        }

        Cart::remove($rowId);
        return redirect()->route('basket');
    }
    public function clear()
    {
        if (auth()->check()) {
            $basket_id = session('basket_id');
            Basket_Product::where('basket_id', $basket_id)->delete();
        }

        Cart::destroy();
        return redirect()->route('basket');
    }
}
