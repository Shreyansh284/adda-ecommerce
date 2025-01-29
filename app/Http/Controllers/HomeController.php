<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\HomeSlider;
use App\Models\Product;
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
        $sliders=HomeSlider::where('status','active')->get();
        // $product
        return view('user.index',compact('sliders'));
    }
    public function shop()
    {
        $products = Product::with(['category', 'images', 'ratings'])
        ->where('status', 'active') // Optional: filter active products
        ->get();
    
        return view('user.shop',compact('products'));
    }
    public function about()
    {
        $abouts=AboutUs::where('status','active')->get();
        return view('user.about',compact('abouts'));
    }
    public function contact()
    {
        $contacts=ContactUs::where('status','active')->latest()->first();
        return view('user.contact',compact('contacts'));
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
