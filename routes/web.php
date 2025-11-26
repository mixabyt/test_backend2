<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'main');
Route::get('/uk/products', ProductController::class)->name('products.uk');
Route::get('/en/products/', ProductController::class)->name('products.en');
