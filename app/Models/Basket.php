<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Basket extends Model
{
    use SoftDeletes;

    protected $table = "basket";
    protected $guarded = [];

    public function order()
    {
        return $this->hasOne('App\Models\Order');
    }
}
