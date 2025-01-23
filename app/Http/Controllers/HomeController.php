<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('user.index');
    }
    public function shop()
    {
        return view('user.shop');
    }
    public function about()
    {
        return view('user.about');
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function productDetails()
    {
        return view('user.productDetails');
    }
    public function myCart()
    {
        return view('user.myCart');
    }
    public function checkout()
    {
        return view('user.checkout');
    }

    public function wishlist()
    {
        return view('user.wishlist');
    }
    public function login()
    {
        return view('user.login');
    }
    public function registration()
    {
        return view('user.registration');
    }
    public function forgot_password()
    {
        return view('user.forgot_password');
    }
    public function registration_action(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->number = $request->number; 
        $user->email = $request->email;
        $user->password = Hash::make($request->password); 
        $user->save();

        return redirect()->route('login');
    }

    public function login_action(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->pwd
        ])) {
            return redirect()->intended('/admin/dashboard'); // or use your home route
        } else {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    }

    public function forgot_password_action(Request $request)
    {
    }

}
