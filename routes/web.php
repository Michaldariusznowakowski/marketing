<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CookieController;
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

Route::get('/', function () {
    return view('welcome');
})->name('index');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/shop', [CoffeeController::class, 'show'])->name('shop');
Route::get('/shop/add-to-cart/{coffeeId}', [CoffeeController::class, 'addToCart'])->name('addToCart');
Route::post('/shop/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/shop/remove-from-cart/{coffeeId}', [CoffeeController::class, 'removeFromCart'])->name('removeFromCart');
Route::get('/shop/orders', [OrderController::class, 'index'])->name('orders');
Route::post('/shop/orders/purge', [OrderController::class, 'purge'])->name('purgeOrders');
Route::get('/cookies/allow', [CookieController::class, 'allow'])->name('cookiesAllow');
Route::get('/cookies/disallow', [CookieController::class, 'disallow'])->name('cookiesDisallow');
