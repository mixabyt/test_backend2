<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\XmlController;
use Illuminate\Routing\RedirectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowMainPage;


Route::get('/', fn () => redirect('/uk'));
Route::get('/{locale}', ShowMainPage::class);
Route::get('/{locale}/products', ProductController::class)->name('products');

Route::get('/products/download/{locale}', [XmlController::class, 'downloadXml'])->name('products.download');
