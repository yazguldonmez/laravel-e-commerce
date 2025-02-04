<?php

use App\Http\Controllers\Frontend\PageHomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\CartController;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
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


//Frontend Routes
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

    Auth::routes();

    Route::get('/login', [CustomAuthController::class, 'login'])->name('login');
    Route::get('/register', [CustomAuthController::class, 'register'])->name('register');
    Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');
});

//Backend Routes || +routes/panel.php
Route::group(['middleware' => ['panel.settings', 'auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('/slider', SliderController::class);
    Route::post('/slider-status/update', [SliderController::class, 'status'])->name('slider.status');
});
