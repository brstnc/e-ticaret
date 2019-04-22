<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function signin()
    {
        if (request()->isMethod('POST')) {
            $this->validate(request(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $credentials = [
                'email' => request('email'),
                'password' => request('password'),
                'admin' => 1
            ];
            if (auth()->attempt($credentials, request()->has('remember'))) {
                return redirect()->route('admin.homepage');
            } else {
                return back()->withInput()->withErrors(['email' => 'Giriş Hatalı']);
            }
        }
        return view('admin.signin');
    }
}
