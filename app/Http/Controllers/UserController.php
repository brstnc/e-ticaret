<?php

namespace App\Http\Controllers;

use App\Mail\UserSignupMail;
use App\Models\Basket;
use App\Models\Basket_Product;
use App\Models\User_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

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
        $credentials = [
            'email' => request('email'),
            'password' => request('password'),
            'active' => 1
        ];
        if (auth()->attempt($credentials, request()->has('remember'))) {
            request()->session()->regenerate();
            $basket_id = Basket::basket_id();
            if (is_null($basket_id)) {
                $basket = Basket::create(['user_id' => auth()->id()]);
                $basket_id = $basket->id;
            }
            session()->put('basket_id', $basket_id);

            if (Cart::count()>0) {
                foreach (Cart::content() as $cartItem)
                {
                    Basket_Product::updateOrCreate(
                        ['basket_id' => $basket_id, 'product_id' => $cartItem->id],
                        ['amount' => $cartItem->qty, 'piece' => $cartItem->price, 'status' => 'Beklemede']
                    );
                }
            }

            Cart::destroy();
            $basket_products = Basket_Product::with('product')->where('basket_id', $basket_id)->get();
            foreach ($basket_products as $basket_product)
            {
                Cart::add($basket_product->product->id, $basket_product->product->product_name, $basket_product->amount, $basket_product->piece, ['slug' => $basket_product->product->slug]);
            }

            return redirect()->intended('/');
        } else {
            $errors = ['mail' => 'Hatalı giriş. Veya hesabınızı aktifleştirin'];
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

        $user->user_details()->save(new User_Details());

        Mail::to(request('email'))->send(new UserSignupMail($user));


        return redirect()->route('user.signin');
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
