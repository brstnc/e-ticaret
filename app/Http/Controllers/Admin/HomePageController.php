<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Cache;

class HomePageController extends Controller
{
    public function index()
    {
        if (!Cache::has('statistics')) {
            $statistics = [
                'pending_order' => Order::where('status', 'Sipariş alındı')->count(),
                'completed_order' => Order::where('status', 'Sipariş tamamlandı')->count(),
                'count' => Product::where('deleted_at', null)->count(),
                'user' => User::where('deleted_at', null)->count()
            ];
            $finish_time = now()->addMinutes(10);
            Cache::put('statistics',$statistics, $finish_time);
        } else {
            $statistics = Cache::get('statistics');
        }
        return view('admin.homepage', compact('statistics'));
    }
}
