<?php

use App\Http\Controllers\Frontend\PageHomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'site.settings'], function () {
    Route::get('/', [PageHomeController::class, 'index'])->name('page.home.index');

    Route::get('/women/{slug?}', [PageController::class, 'products'])->name('women.clothing');
    Route::get('/men/{slug?}', [PageController::class, 'products'])->name('men.clothing');
    Route::get('/kids/{slug?}', [PageController::class, 'products'])->name('kids.clothing');

    Route::get('/products', [PageController::class, 'products'])->name('products.index');
    Route::get('/product/{slug}', [PageController::class, 'productDetail'])->name('product.detail');
    Route::get('/about', [PageController::class, 'about'])->name('page.about');
    Route::get('/contact', [PageController::class, 'contact'])->name('page.contact');
    Route::post('/contact', [AjaxController::class, 'contactStore'])->name('page.contact.store');
    Route::get('/discounted-products', [PageController::class, 'discountedProducts'])->name('discounted.products');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart', [CartController::class, 'remove'])->name('cart.remove');
});
