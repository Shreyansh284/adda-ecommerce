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
        $sliders = HomeSlider::where('status', 'active')->get();
        // $product
        return view('user.index', compact('sliders'));
    }
    public function shop()
    {
        $products = Product::with(['category', 'images', 'ratings'])
            ->where('status', 'active') // Optional: filter active products
            ->get();

        return view('user.shop', compact('products'));
    }
    public function about()
    {
        $abouts = AboutUs::where('status', 'active')->get();
        return view('user.about', compact('abouts'));
    }
    public function contact()
    {
        $contacts = ContactUs::where('status', 'active')->latest()->first();
        return view('user.contact', compact('contacts'));
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
        $request->validate([
            'first_name' => 'required|string|max:50',
            'mobile_number' => 'required|numeric|digits:10|unique:users,mobile',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
        // dd($request->all());
        // User::create([
        //     'name' => $request->first_name,
        //     'mobile' => $request->mobile_number,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        $user = new User();
        $user->name = $request->first_name;
        $user->mobile = $request->mobile_number;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('login');

        // return redirect()->route('login');
    }

    public function login_action(Request $request)
    {
        // Backend validation rules
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Attempt login with "remember me" functionality
        if (Auth::attempt($credentials, $request->remember)) {
            $user = Auth::user();

            // Role-based redirection
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role === 'user') {
                return redirect('/');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Unauthorized role access.'])->withInput();
            }
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Invalid email or password.',
            ])->withInput();
        }
    }

    public function logout(Request $request)
    {
        // Invalidate the user session
        Auth::logout();

        // Clear session and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login or home page
        return redirect('/');
    }

    public function forgot_password_action(Request $request) {}
}
