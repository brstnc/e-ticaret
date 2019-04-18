<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Details extends Model
{
    protected $table = 'user_details';
    public $timestamps = false;
    protected  $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
