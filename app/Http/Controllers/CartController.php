<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Get logged-in user

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view the cart.');
        }

        // Fetch cart items with product details
        $cartItems = Cart::where('userId', $user->id)
            ->with('product') // Assuming Cart model has a 'product' relationship
            ->get();

        // Calculate total price
        $totalPrice = $cartItems->sum(function ($cartItem) {
            $discountedPrice = $cartItem->product->discount 
                ? $cartItem->product->price - ($cartItem->product->price * ($cartItem->product->discount / 100)) 
                : $cartItem->product->price;

            return $discountedPrice * $cartItem->quantity;
        });

        return view('user.myCart', compact('cartItems', 'totalPrice'));
    }


    public function addToCart(Request $request)
    {
        // Ensure the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to add items to your cart.');
        }
     
        $user = Auth::user();
        $product = Product::find($request->product_id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Check if the product is already in the cart
        $cartItem = Cart::where('userId', $user->id)
                        ->where('productId', $product->id)
                        ->first();

        if ($cartItem) {
            // Update quantity if the product is already in the cart
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Add a new product to the cart
            $cart=new Cart();
            $cart->userId=$user->id;
            $cart->productId=$product->id;
            $cart->quantity = $request->quantity;
            $cart->save();
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
