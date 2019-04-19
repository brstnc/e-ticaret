<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Basket extends Model
{
    use SoftDeletes;

    protected $table = "basket";
    protected $guarded = [];

    public function order()
    {
        return $this->hasOne('App\Models\Order');
    }

    public static function basket_id()
    {
        $basket = DB::table('basket')
            ->leftJoin('order', 'order.basket_id', '=', 'basket.id')
            ->where('basket.user_id', auth()->id())
            ->whereRaw('basket.id is null')
            ->orderByDesc('basket.created_at')
            ->select('basket.id')
            ->first();

        if (!is_null($basket)) return $basket->id;
    }

    public function basket_product_count()
    {
        return DB::table('basket_product')->where('basket_id', $this->id)->sum('amount');
    }

    public function basket_products()
    {
        return $this->hasMany('App\Models\Basket_Product');
    }
}
