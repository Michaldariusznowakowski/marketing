<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ItemController;

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
Route::get('/shop/{coffeeId}', [ShopController::class, 'showProduct'])->name('product');
Route::get('/cart/add-to-cart/{coffeeId}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/cart/remove-from-cart/{coffeeId}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::get('/cart/increment/{coffeeId}', [CartController::class, 'increment'])->name('incrementCart');
Route::get('/cart/decrement/{coffeeId}', [CartController::class, 'decrement'])->name('decrementCart');
Route::get('/cart/orders', [CartController::class, 'showOrders'])->name('orders');
Route::post('/cart/orders/purge', [CartController::class, 'purge'])->name('purgeOrders');
Route::get('/cookies/allow', [CookieController::class, 'allow'])->name('cookiesAllow');
Route::get('/cookies/disallow', [CookieController::class, 'disallow'])->name('cookiesDisallow');
Route::get('/admin', function () {
    if (Auth::check()) {
        return view('admin.index');
    } else {
        return view('admin.login');
    }
})->name('admin.index');
Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin.logout');
Route::post('/admin/login', [UserController::class, 'login'])->name('admin.login');
Route::get('/admin/users', [UserController::class, 'users'])->name('admin.users')->middleware('admin');
Route::post('/admin/users/add', [UserController::class, 'addUser'])->name('admin.users.add')->middleware('admin');
Route::post('/admin/users/delete', [UserController::class, 'deleteUser'])->name('admin.users.delete')->middleware('admin');
Route::post('/admin/users/updatePassword', [UserController::class, 'updatePassword'])->name('admin.users.updatePassword')->middleware('admin');
Route::post('/admin/users/updateRole', [UserController::class, 'updateRole'])->name('admin.users.updateRole')->middleware('admin');
Route::get('/admin/items', [ItemController::class, 'show'])->name('admin.items')->middleware('employee');
Route::post('/admin/items/add', [ItemController::class, 'addItem'])->name('admin.items.add')->middleware('employee');
Route::post('/admin/items/delete', [ItemController::class, 'deleteItem'])->name('admin.items.delete')->middleware('admin');
Route::post('/admin/items/edit', [ItemController::class, 'updateItem'])->name('admin.items.update')->middleware('employee');
Route::get('/admin/items/import', [ItemController::class, 'showImportForm'])->name('admin.items.import')->middleware('admin');
Route::post('/admin/items/import', [ItemController::class, 'import'])->name('admin.items.importCsv')->middleware('admin');
Route::post('/admin/items/import/cols', [ItemController::class, 'importCsvWithCols'])->name('admin.items.importCsvWithCols')->middleware('admin');
Route::get('/admin/orders', [OrderController::class, 'adminOrders'])->name('admin.orders')->middleware('employee');
Route::post('/admin/orders/updateStatus', [OrderController::class, 'updateOrderStatus'])->name('admin.orders.updateStatus')->middleware('employee');
Route::get('/admin/ratings', [RatingController::class, 'adminShow'])->name('admin.ratings')->middleware('employee');
Route::post('/admin/ratings/delete/{id}', [RatingController::class, 'delete'])->name('admin.ratings.delete')->middleware('admin');
Route::get('/ratings', [RatingController::class, 'show'])->name('ratings')->middleware('employee');
Route::get('/ratings/form/{unique_access_token}', [RatingController::class, 'showForm'])->name('ratingsForm')->middleware('admin');
Route::post('/ratings/create', [RatingController::class, 'create'])->name('ratingsCreate')->middleware('admin');
