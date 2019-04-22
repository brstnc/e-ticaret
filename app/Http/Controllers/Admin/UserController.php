<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{


    public function index()
    {
        $list = User::orderbyDesc('created_at')->paginate(8);
        return view('admin.user.index', compact('list'));
    }

    public function form()
    {

    }

    public function save()
    {

    }

    public function delete()
    {

    }

}
