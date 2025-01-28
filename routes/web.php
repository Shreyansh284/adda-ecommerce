<?php

use App\Http\Controllers\AdminController;
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
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/productDetails', [HomeController::class, 'productDetails']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/myCart', [HomeController::class, 'myCart']);
Route::get('/wishlist', [HomeController::class, 'wishlist']);
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/registration', [HomeController::class, 'registration'])->name('registration');
Route::get('/forgot-password', [HomeController::class, 'forgot_password'])->name('forgot_password');
Route::post('/registration', [HomeController::class, 'registration_action'])->name('registration_action');
Route::post('/login', [HomeController::class, 'login_action'])->name('login_action');
Route::post('/forgot-password', [HomeController::class, 'forgot_password_action'])->name('forgot_password_action');

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
