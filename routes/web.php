<?php

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ShopController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

/**
 *SHOP
 */
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/{product:id}', [ShopController::class, 'show'])->name('shop.show');

/**
 *CART
 */

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])
   ->name('cart.store');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
