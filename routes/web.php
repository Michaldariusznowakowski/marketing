<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\ImportCsvController;
use App\Http\Controllers\ContactController;

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
Route::get('/cart', [CartController::class, 'show'])->name('cart');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send']);
Route::get('/shop', [ShopController::class, 'show'])->name('shop');
Route::get('/cart/add-to-cart/{coffeeId}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/cart/remove-from-cart/{coffeeId}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::get('/cart/increment/{coffeeId}', [CartController::class, 'increment'])->name('incrementCart');
Route::get('/cart/decrement/{coffeeId}', [CartController::class, 'decrement'])->name('decrementCart');
Route::get('/cart/orders', [CartController::class, 'showOrders'])->name('orders');
Route::post('/cart/orders/purge', [CartController::class, 'purge'])->name('purgeOrders');
Route::get('/cookies/allow', [CookieController::class, 'allow'])->name('cookiesAllow');
Route::get('/cookies/disallow', [CookieController::class, 'disallow'])->name('cookiesDisallow');
Route::get('/importcsv', [ImportCsvController::class, 'show'])->name('import_csv');
Route::post('/importcsv', [ImportCsvController::class, 'import'])->name('import_csv');
Route::post('/importcsv/cols', [ImportCsvController::class, 'importWithCols'])->name('import_csv_cols');
