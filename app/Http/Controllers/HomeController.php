<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view ('user.contact');
    }
    public function productDetails()
    {
        return view ('user.productDetails');
    }
    public function myCart()
    {
        return view ('user.myCart');
    }
    public function checkout()
    {
        return view ('user.checkout');
    }
}
