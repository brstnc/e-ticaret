<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = "order";
    protected $fillable = ['basket_id', 'order_amount', 'bank', 'number_instalments', 'status'];

    public function basket()
    {
        return $this->belongsTo('App\Models\Basket');
    }
}
