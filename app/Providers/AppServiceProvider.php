<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!Cache::has('statistics')) {
            $statistics = [
                'pending_order' => Order::where('status', 'Sipariş alındı')->count(),
                'completed_order' => Order::where('status', 'Sipariş tamamlandı')->count(),
                'products' => Product::where('deleted_at', null)->count(),
                'users' => User::where('deleted_at', null)->count(),
                'orders' => Order::where('deleted_at', null)->count(),
                'categories' => Category::where('deleted_at', null)->count()
            ];
            $finish_time = now()->addMinutes(10);
            Cache::put('statistics',$statistics, $finish_time);
        } else {
            $statistics = Cache::get('statistics');
        }
        View::share('statistics', $statistics);
    }
}
