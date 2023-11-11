<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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
    return view('home');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('products', 'App\Http\Controllers\ProductsController');

Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('productList');
Route::get('/products/{id}', [App\Http\Controllers\ProductsController::class, 'show'])->name('productInfo');

Route::get('/cart', [App\Http\Controllers\ProductsController::class, 'cart'])->name('cart')->middleware('auth');
Route::get('/cart-remove', [App\Http\Controllers\ProductsController::class, 'removeAll'])->name('cartRemove')->middleware('auth');

Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'show'])->middleware('auth')->name('user.show');

Route::get('/info', function () {
    return view('info');
});

Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductsController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove.from.cart');

Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');