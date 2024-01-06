<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\OrderController;
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
Route::get('/cart', function () {
    return view('cart');
})->name('cart');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send']);
Route::get('/shop', [CoffeeController::class, 'show'])->name('shop');
Route::get('/shop/add-to-cart/{coffeeId}', [CoffeeController::class, 'addToCart'])->name('addToCart');
Route::post('/shop/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/shop/remove-from-cart/{coffeeId}', [CoffeeController::class, 'removeFromCart'])->name('removeFromCart');
Route::get('/shop/orders', [OrderController::class, 'index'])->name('orders');
Route::post('/shop/orders/purge', [OrderController::class, 'purge'])->name('purgeOrders');
Route::get('/cookies/allow', [CookieController::class, 'allow'])->name('cookiesAllow');
Route::get('/cookies/disallow', [CookieController::class, 'disallow'])->name('cookiesDisallow');
Route::get('/importcsv', [ImportCsvController::class, 'show'])->name('import_csv');
Route::post('/importcsv', [ImportCsvController::class, 'import'])->name('import_csv');
Route::post('/importcsv/cols', [ImportCsvController::class, 'importWithCols'])->name('import_csv_cols');
