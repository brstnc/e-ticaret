<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with('basket')->orderByDesc('created_at')->get();
        return view('orders', compact('orders'));
    }
    public function detail($id)
    {
        $order = Order::all();
        return view('order', compact('order'));
    }
}
