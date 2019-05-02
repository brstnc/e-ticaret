<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class HomePageController extends Controller
{
    public function index()
    {
        $pending_order = Order::where('status', 'Sipariş alındı')->count();
        $completed_order = Order::where('status', 'Sipariş tamamlandı')->count();
        $count = Product::where('deleted_at', null)->count();
        $user = User::where('deleted_at', null)->count();

        return view('admin.homepage', compact('pending_order', 'completed_order', 'count', 'user'));
    }
}
