<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with('basket')
            ->whereHas('basket', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->orderByDesc('created_at')
            ->get();
        return view('orders', compact('orders'));
    }
    public function detail($id)
    {
        $order = Order::with('basket.basket_products.product')
            ->whereHas('basket', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('order.id', $id)->firstOrFail();
        return view('order', compact('order'));
    }
}
