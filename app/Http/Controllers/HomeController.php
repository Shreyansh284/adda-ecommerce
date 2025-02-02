<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Cart;
use App\Models\City;
use App\Models\ContactUs;
use App\Models\HomeSlider;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Rating;
use App\Models\State;
use App\Models\User;
use App\Models\Wishlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class HomeController extends Controller
{
    //
    public function index()
    {
        $sliders = HomeSlider::where('status', 'active')->get();
        $newArrivals = Product::with(['category', 'images', 'ratings'])
        ->where('status', 'active') // Optional: filter active products
        ->orderBy('created_at', 'desc')
        ->get();


        $trendingProducts = Product::with(['category', 'images', 'ratings'])
        ->where('status', 'active') // Optional: filter active products
        ->orderBy('created_at', 'desc')
        ->get();
       
    
    
        return view('user.index', compact('sliders', 'newArrivals', 'trendingProducts'));
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
    public function productDetails($id)
    {
        $product = Product::with(['category', 'images', 'ratings.users','sizes.color','subCategory.category'])->where('id',$id)->first();
        $ratings=Rating::where('productId',$id)->get();
        $products = Product::with(['category', 'images', 'ratings.users'])->where('categoryId',$product->category->id)->get();
        return view('user.productDetails',compact('product','products'));
    }
    public function myCart()
    {
        return view('user.myCart');
    }
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cartItems = Auth::user()->orderItems()
            ->with(['product.images']) // Load product and related images
            ->where('status', 'pending')
            ->get();
        $quantity = 0;

        // Calculate subtotal and track quantity
        $subtotal = $cartItems->sum(function ($item) use (&$quantity) {
            $quantity += $item->quantity; // Increment the quantity
            return $item->price; // Multiply product price by quantity
        });


        $shipping = 40;

        // Tax (18% of subtotal)
        $tax = ($subtotal * 0.18);

        // Grand total (subtotal + shipping + tax)
        $grandTotal = $subtotal + $shipping + $tax;
        $api = new Api('rzp_test_aRaPVVcfmtYbxs', 'jkHdIzp785lAnSO1oh25o6Xe');
        $order = $api->order->create(array(
            'receipt' => '123',
            'amount' => $grandTotal * 100,
            'currency' => 'INR'
        ));
        $orderId = $order['id'];
        session()->put('orderId', $orderId);
        session()->put('amount', $subtotal);
        session()->put('orderTotal', $grandTotal);
        // Shipping charge (fixed at 40 rupees)

        // Save order details in database
        $data = new Payment();
        $data->email = $user->email;
        $data->userid = $user->id;
        $data->totalAmount = $grandTotal;
        $data->paymentId = $orderId;
        $data->save();

        $village = $request->input('billing-village');
        $city = $request->input('billing-town-city');
        $state = $request->input('billing-state');
        $street = $request->input('billing-street');
        $streetOptional = $request->input('billing-street-optional');
        $zip = $request->input('billing-zip');

        // Combine all address fields
        $address = trim(
            ($village ? "Village: $village, " : "") .
                "City: $city, State: $state, Street: $street" .
                ($streetOptional ? ", $streetOptional" : "") .
                ", ZIP: $zip"
        );

        $orderData = new Order();
        $orderData->orderId = $orderId;
        $orderData->userid = $user->id;
        $orderData->price = $grandTotal;
        $orderData->quantity = $quantity;
        $orderData->address = $address;
        $orderData->save();

        return view('user.checkout', compact('cartItems', 'subtotal', 'shipping', 'tax', 'grandTotal'));
    }

    function payOnline(Request $request)
    {
        $data = $request->all();
        $user = Payment::where('paymentId', session('orderId'))->first();
        $user->status = 'completed';
        $user->razorpayId = $data['razorpay_payment_id'];
        $api = new Api('rzp_test_aRaPVVcfmtYbxs', 'jkHdIzp785lAnSO1oh25o6Xe');
        // dd($request->all(),$user, $api);
        $order = Order::where('orderId', session('orderId'))->first();
        $order->paymentMode = "Online";
        $order->save();
        try {
            $attributes = array(
                'razorpay_signature' => $data['razorpay_signature'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_order_id' => $data['razorpay_order_id']
            );
            $order = $api->utility->verifyPaymentSignature($attributes);
            $success = true;
        } catch (SignatureVerificationError $e) {
            $success = false;
        }

        if ($success) {
            // Save payment status
            $user->save();

            // Update order items status to 'completed'
            $orderItems = OrderItem::where('userId', $user->userId)
                ->where('status', 'pending')
                ->get();
            foreach ($orderItems as $item) {
                $item->status = 'ordered';
                $item->save();
            }
            Cart::where('userId', $user->userId)->delete();
            session()->flash('done', 'Payment done');
        } else {
            session()->flash('not', 'Payment not done');
        }
        session()->forget('orderId');
        session()->forget('amount');
        session()->forget('orderTotal');
        return redirect('/');
    }
    function payOffline(Request $request)
    {
        $data = $request->all();
        $user = Payment::where('paymentId', session('orderId'))->first();
        $user->status = 'completed';
        // $user->razorpayId = $data['razorpay_payment_id'];
        // $api = new Api('rzp_test_aRaPVVcfmtYbxs', 'jkHdIzp785lAnSO1oh25o6Xe');
        // dd($request->all(),$user, $api);
        $order = Order::where('orderId', session('orderId'))->first();
        $order->paymentMode = "Offline";
        $order->save();
        // try {
        //     $attributes = array(
        //         'razorpay_signature' => $data['razorpay_signature'],
        //         'razorpay_payment_id' => $data['razorpay_payment_id'],
        //         'razorpay_order_id' => $data['razorpay_order_id']
        //     );
        //     $order = $api->utility->verifyPaymentSignature($attributes);
        //     $success = true;
        // } catch (SignatureVerificationError $e) {
        //     $success = false;
        // }

        // if ($success) {
        //     // Save payment status
        $user->save();

        // Update order items status to 'completed'
        $orderItems = OrderItem::where('userId', $user->userId)
            ->where('status', 'pending')
            ->get();
        foreach ($orderItems as $item) {
            $item->status = 'ordered';
            $item->save();
        }
        Cart::where('userId', $user->userId)->delete();

        session()->forget('orderId');
        session()->forget('amount');
        session()->forget('orderTotal');
        return redirect('/');
    }

    public function wishlist()
    {
        // $wishlist = Wishlist::where('userId', Auth::user()->id)->get();
        $wishlists = Wishlist::with('products.images')->where('userId', Auth::user()->id)->get();
        // dd($wishlists); 

        return view('user.wishlist', compact('wishlists'));
    }

    public function addToWishlist($id)
    {
        $wishlist = new Wishlist();
        $wishlist->productId = $id;
        $wishlist->userId = Auth::user()->id;
        $save = $wishlist->save();
        if ($save) {
            return redirect('/wishlist');
        }
        return redirect('/wishlist');
    }

    public function removeFromWishlist($id)
    {
        $wishlist = Wishlist::where('id', $id)->delete();
        if ($wishlist) {
            // return redirect('/wishlist');
            return redirect()->back();
        }
        // dd('test');
    }

    public function clearWishlist()
    {
        $wishlist = Wishlist::where('userId', Auth::user()->id)->delete();
        if ($wishlist) {
            return redirect('/wishlist');
        }
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

    public function googleLogin()
    {
        // dd("fds");
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentication()
    {
        // dd(Socialite::driver('google')->user());
        try
        {
            $googleUser=Socialite::driver('google')->user();
            // dd($googleUser);
            $user = User::where('googleId', $googleUser->id)->first();
            // dd($user);
            if($user!=null)
            {
                // dd("hi");
                Auth::login($user);
                return redirect('/');
            }
            else
            {
                $newUser = new User();
                $newUser->name=$googleUser->name;
                $newUser->email=$googleUser->email;
                $newUser->password=Hash::make($googleUser->name);
                $newUser->googleId=$googleUser->id;
                $newUser->save();
            //    $userdata= User::create(['name'=>$googleUser->name,'email'=>$googleUser->email,'password'=>Hash::make($googleUser->name),'googleId'=>$googleUser->id]);
                if($newUser)
                {
                    Auth::login($newUser);
                    return redirect('/');
                }
            }
        }
        catch(Exception $e)
        {
            return redirect('/')->with('error','Something went wrong');
        }


    }

    public function forgot_password_action(Request $request) {}

    public function getStates()
    {
        $states = State::where('status', 'active')->get();
        return response()->json($states);
    }

    // Fetch cities by state_id
    public function getCities($stateId)
    {
        $cities = City::where('stateId', $stateId)->where('status', 'active')->get(['id', 'city']);
        return response()->json($cities);
    }
}
