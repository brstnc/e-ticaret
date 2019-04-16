<?php

namespace App\Http\Controllers;

use App\Mail\UserSignupMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends Controller
{
    public function signin_form()
    {
        return view('user.signin');
    }

    public function signin()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email' => request('email'), 'password' => request('password')], request()->has('remember'))) {
            request()->session()->regenerate();
            return redirect()->intended('/');
        } else {
            $errors = ['mail' => 'Hatalı giriş'];
            return back()->withErrors($errors);
        }

    }

    public function signup_form()
    {
        return view('user.signup');
    }

    public function signup()
    {
        $this->validate(request(), [
            'name_lastname' => 'required|min:5|max:60',
            'email' => 'required|email|unique:user',
            'password' => 'required|confirmed|min:5|max:15|'
        ]);

        $user = User::create([
            'name_lastname'=> request('name_lastname'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'activation_key' => Str::random(6),
            'active' => '0'
        ]);

        Mail::to(request('email'))->send(new UserSignupMail($user));

        Auth::login($user);

        return redirect()->route('homepage');
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('homepage');
    }

    public function active($key)
    {
        $user = User::where('activation_key', $key)->first();
        if(!is_null($user)) {
            $user->activation_key = null;
            $user->active = 1;
            $user->save();
            return redirect()->to('/');
        }
    }
}
