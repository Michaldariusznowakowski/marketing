<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\ImportCsvController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/importcsv', [ImportCsvController::class, 'show'])->name('import_csv');
Route::post('/importcsv', [ImportCsvController::class, 'import'])->name('import_csv');
Route::post('/importcsv/cols', [ImportCsvController::class, 'importWithCols'])->name('import_csv_cols');
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

//Route::get('/admin/comments', [AdminController::class, 'comments'])->name('admin.comments');
//Route::post('/admin/comments/delete', [AdminController::class, 'deleteComment'])->name('admin.comments.delete');
//Route::get('/admin/items', [AdminController::class, 'items'])->name('admin.items');
//Route::post('/admin/items/add', [AdminController::class, 'addItem'])->name('admin.items.add');
//Route::post('/admin/items/delete', [AdminController::class, 'deleteItem'])->name('admin.items.delete');
//Route::post('/admin/items/edit', [AdminController::class, 'updateItem'])->name('admin.items.update');
//Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
//Route::post('/admin/orders/delete', [AdminController::class, 'deleteOrder'])->name('admin.orders.delete');
//Route::post('/admin/orders/updateStatus', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.updateStatus');
Route::get('/admin/comments', function () {
    return view('admin.index');
})->name('admin.comments');
Route::get('/admin/items', function () {
    return view('admin.index');
})->name('admin.items');
Route::get('/admin/comments', function () {
    return view('admin.index');
})->name('admin.comments');

Route::get('/admin/orders', [OrderController::class, 'adminOrders'])->name('admin.orders')->middleware('employee');
Route::post('/admin/orders/updateStatus', [OrderController::class, 'updateOrderStatus'])->name('admin.orders.updateStatus')->middleware('employee');
