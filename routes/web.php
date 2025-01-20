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

// ADMIN
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
Route::get('/admin/products',[AdminController::class,'products']);
Route::get('/admin/users',[AdminController::class,'users']);
Route::get('/admin/orders',[AdminController::class,'orders']);