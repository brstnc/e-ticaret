<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected  $table = "category";
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'category_product');
    }

    public function up_category()
    {
        return $this->belongsTo('App\Models\Category', 'up_id')->withDefault([
           'category_name' => 'Ana Kategori'
        ]);
    }
}
