<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        if (count(Cart::content())==0) {
            return redirect()->route('homepage');
        }

        $detail = auth()->user()->user_details;

        return view('payment', compact('detail'));

    }

    public function pay()
    {
        $order = request()->all();
        $order['basket_id'] = session('basket_id');
        $order['number_instalments'] = '1';
        $order['order_amount'] = Cart::subtotal(null, null, '');
        $order['bank'] = 'Ziraat';
        $order['status'] = 'Siparişiniz alındı';

        Order::create($order);
        Cart::destroy();
        session()->forget('basket_id');

        return redirect()->route('orders');
    }

}
