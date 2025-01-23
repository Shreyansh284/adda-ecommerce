<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// HOME
Route::get('/',[HomeController::class,'index']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/contact',[HomeController::class,'contact']);
Route::get('/shop',[HomeController::class,'shop']);
Route::get('/productDetails',[HomeController::class,'productDetails']);
Route::get('/checkout',[HomeController::class,'checkout']);
Route::get('/myCart',[HomeController::class,'myCart']);
Route::get('/wishlist',[HomeController::class,'wishlist']);
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::get('/registration',[HomeController::class,'registration'])->name('registration');
Route::get('/forgot-password',[HomeController::class,'forgot_password'])->name('forgot_password');
Route::post('/registration',[HomeController::class,'registration_action'])->name('registration_action');
Route::post('/login',[HomeController::class,'login_action'])->name('login_action');
Route::post('/forgot-password',[HomeController::class,'forgot_password_action'])->name('forgot_password_action');

// ADMIN
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
Route::get('/admin/products',[AdminController::class,'products']);
Route::get('/admin/users',[AdminController::class,'users']);
Route::get('/admin/orders',[AdminController::class,'orders']);
Route::get('/admin/product/add',[AdminController::class,'addProduct']);