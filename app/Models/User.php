<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $table = "user";

    protected $fillable = [
        'name_lastname', 'email', 'password', 'activation_key', 'active', 'admin'
    ];

    protected $hidden = [
        'password', 'activation_key',
    ];

    public function user_details()
    {
        return $this->hasOne('App\Models\User_Details');
    }
}
