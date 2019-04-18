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

    public function basket_id()
    {
        $basket = DB::table('basket as b')
            ->leftJoin('order as o', 'o.basket_id', '=', 'b.id')
            ->where('b.user_id', auth()->id())
            ->whereRaw('b.id is null')
            ->orderByDesc('b.create_at')
            ->select('b.id')
            ->first();

        if (!is_null($basket)) return $basket->id;
    }
}
