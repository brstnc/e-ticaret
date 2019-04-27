<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signin()
    {
        if ( !Auth::guard('admin')->check()) {
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
                if (Auth::guard('admin')->attempt($credentials, request()->has('remember'))) {
                    return redirect()->route('admin.homepage');
                } else {
                    return back()->withInput()->withErrors(['email' => 'Giriş Hatalı']);
                }
            }

            return view('admin.signin');
        } else {
            return redirect()->route('admin.homepage');
        }

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('admin.signin');
    }
}
