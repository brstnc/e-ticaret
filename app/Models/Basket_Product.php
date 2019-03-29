<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Basket_Product extends Model
{
    use SoftDeletes;

    protected $table = "basket_product";
    protected $guarded = [];

}
