<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

Route::get('/', [ProductController::class, 'index']);

// Product routes
Route::resource('products', ProductController::class);
Route::patch('/products/{product}/toggle', [ProductController::class, 'toggleStatus'])->name('products.toggle');

// Order routes
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
