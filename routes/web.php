<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

// HOME
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/registration', [HomeController::class, 'registration'])->name('registration');
Route::get('/forgot-password', [HomeController::class, 'forgot_password'])->name('forgot_password');
Route::post('/registration', [HomeController::class, 'registration_action'])->name('registration_action');
Route::post('/login', [HomeController::class, 'login_action'])->name('login_action');
Route::post('/forgot-password', [HomeController::class, 'forgot_password_action'])->name('forgot_password_action');

Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/productDetails', [HomeController::class, 'productDetails']);

Route::controller(HomeController::class)->group(function()
{

    Route::get('/auth/googleLogin','googleLogin')->name('auth.googleLogin');
    Route::get('/auth/google/call-back','googleAuthentication');
});

Route::middleware(['admin:admin'])->group(function () {


    // ADMIN
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/products', [ProductController::class, 'index']);
    Route::get('/admin/users', [AdminController::class, 'users']);
    Route::get('/admin/orders', [OrderController::class, 'index']);
    Route::get('/admin/categories', [CategoryController::class, 'index']);
    Route::get('/admin/subCategories', [SubCategoryController::class, 'index']);
    Route::get('/admin/ratings', [RatingController::class, 'index']);
    Route::get('/admin/sizes', [SizeController::class, 'index']);
    Route::get('/admin/colors', [ColorController::class, 'index']);
    Route::get('/admin/cities', [CityController::class, 'index']);
    Route::get('/admin/states', [StateController::class, 'index']);
    Route::get('/admin/payments', [PaymentController::class, 'index']);
    Route::get('/admin/product/add', [ProductController::class, 'create']);
    Route::post('/admin/product/add', [ProductController::class, 'store'])->name("store-product");
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

    // About Us
    Route::get('/admin/aboutUs', [AdminController::class, 'aboutUs']);
    Route::get('/admin/aboutUs/add', [AdminController::class, 'createAboutUs']);
    Route::post('/admin/aboutUs/add', [AdminController::class, 'storeAboutUs'])->name('store-about');
    Route::get('/admin/aboutUs/edit/{id}', [AdminController::class, 'editAboutUs']);
    Route::post('/admin/aboutUs/edit/{id}', [AdminController::class, 'updateAboutUs'])->name('update-about');
    Route::get('/admin/aboutUs/delete/{id}', [AdminController::class, 'deleteAboutUs']);
    Route::get('/admin/aboutUs/status/{id}', [AdminController::class, 'toggleStatusAboutUs']);


    // Contact Us 
    Route::get('/admin/contactUs', [AdminController::class, 'contactUs']);
    Route::get('/admin/contactUs/add', [AdminController::class, 'createContactUs']);
    Route::post('/admin/contactUs/add', [AdminController::class, 'storeContactUs'])->name('store-contact');
    Route::get('/admin/contactUs/edit/{id}', [AdminController::class, 'editContactUs']);
    Route::post('/admin/contactUs/edit/{id}', [AdminController::class, 'updateContactUs'])->name('update-contact');
    Route::get('/admin/contactUs/delete/{id}', [AdminController::class, 'deleteContactUs']);
    Route::get('/admin/contactUs/status/{id}', [AdminController::class, 'toggleStatusContactUs']);

    // Home Slider
    Route::get('/admin/slider', [AdminController::class, 'homeSlider']);
    Route::get('/admin/slider/add', [AdminController::class, 'createHomeSlider']);
    Route::post('/admin/slider/add', [AdminController::class, 'storeHomeSlider'])->name('store-slider');
    Route::get('/admin/slider/edit/{id}', [AdminController::class, 'editHomeSlider']);
    Route::post('/admin/slider/edit/{id}', [AdminController::class, 'updateHomeSlider'])->name('update-slider');
    Route::get('/admin/slider/delete/{id}', [AdminController::class, 'deleteHomeSlider']);
    Route::get('/admin/slider/status/{id}', [AdminController::class, 'toggleStatusHomeSlider']);



    // Categories
    Route::get('/admin/categories', [CategoryController::class, 'index']);
    Route::get('/admin/category/add', [CategoryController::class, 'create']);
    Route::post('/admin/category/add', [CategoryController::class, 'store'])->name('store-category');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('update-category');
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'destroy']);
    Route::get('/admin/category/status/{id}', [CategoryController::class, 'toggleStatus']);

    // Sub Categories
    Route::get('/admin/subCategories', [SubCategoryController::class, 'index']);
    Route::get('/admin/subCategory/add', [SubCategoryController::class, 'create']);
    Route::post('/admin/subCategory/add', [SubCategoryController::class, 'store'])->name('store-subCategory');
    Route::get('/admin/subCategory/edit/{id}', [SubCategoryController::class, 'edit']);
    Route::post('/admin/subCategory/update/{id}', [SubCategoryController::class, 'update'])->name('update-subCategory');
    Route::get('/admin/subCategory/delete/{id}', [SubCategoryController::class, 'destroy']);
    Route::get('/admin/subCategory/status/{id}', [SubCategoryController::class, 'toggleStatus']);

    // Rating

    Route::get('/admin/ratings', [RatingController::class, 'index']);
    Route::get('/admin/rating/status/{id}', [RatingController::class, 'toggleStatus']);




    // Admin created by Monil

    //  state
    Route::get('/admin/state/add', [StateController::class, 'create']);
    Route::post('/admin/state/add', [StateController::class, 'store'])->name('store-state');
    Route::get('/admin/state/edit/{id}', [StateController::class, 'edit'])->name('edit-state');
    Route::post('/admin/state/update', [StateController::class, 'update'])->name('update-state');
    Route::post('/admin/state/toggle-state-status', [StateController::class, 'toggleStatus'])->name('toggleStateStatus');
    Route::get('/admin/state/delete/{id}', [StateController::class, 'destroy'])->name('delete-state');


    //  city
    Route::get('/admin/city/add', [CityController::class, 'create']);
    Route::post('/admin/city/add', [CityController::class, 'store'])->name('store-city');
    Route::get('/admin/city/edit/{id}', [CityController::class, 'edit'])->name('edit-city');
    Route::post('/admin/city/update', [CityController::class, 'update'])->name('update-city');
    Route::post('/admin/city/toggle-city-status', [CityController::class, 'toggleStatus'])->name('toggleCityStatus');
    Route::get('/admin/city/delete/{id}', [CityController::class, 'destroy'])->name('delete-city');

    //  color
    Route::get('/admin/color/add', [ColorController::class, 'create']);
    Route::post('/admin/color/add', [ColorController::class, 'store'])->name('store-color');
    Route::get('/admin/color/edit/{id}', [ColorController::class, 'edit'])->name('edit-color');
    Route::post('/admin/color/update', [ColorController::class, 'update'])->name('update-color');
    Route::get('/admin/color/delete/{id}', [ColorController::class, 'destroy'])->name('delete-color');
});


// User Dashboard
Route::middleware(['user:user'])->group(function () {
    // Route::get('/about', [HomeController::class, 'about']);
    // Route::get('/contact', [HomeController::class, 'contact']);
    // Route::get('/shop', [HomeController::class, 'shop']);
    Route::get('/productDetails', [HomeController::class, 'productDetails'])->name('product.detail');
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');


    Route::get('/myCart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'addToCart'])->name('cart.remove');

    Route::get('/wishlist', [HomeController::class, 'wishlist']);
    Route::get('/wishlist/add/{id}', [HomeController::class, 'addToWishlist']);
    Route::get('/wishlist/remove/{id}', [HomeController::class, 'removeFromWishlist']);
    Route::get('/wishlist/clear', [HomeController::class, 'clearWishlist']);
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
});
