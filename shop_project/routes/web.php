<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'App\Http\Controllers\MainController@index')->name('index.index');
Route::get('/product', 'App\Http\Controllers\MainController@product')->name('product.index');
Route::get('/login', 'App\Http\Controllers\MainController@login')->name('login.index');
Route::get('/signup', 'App\Http\Controllers\MainController@signup')->name('signup.index');
Route::get('/admin', 'App\Http\Controllers\MainController@admin')->name('admin.index');
Route::get('/confirmation', 'App\Http\Controllers\MainController@admin')->name('confirmation');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home.index');


// SIDEBAR

Route::get('/products', 'App\Http\Controllers\AdminController@products')->name('products.index');
Route::get('/users', 'App\Http\Controllers\AdminController@users')->name('users.index');
Route::get('/orders', 'App\Http\Controllers\AdminController@orders')->name('orders.index');


// ORDERS


Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::delete('/orders/destroy/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::put('/orders/approve/{id}', [OrderController::class, 'approve'])->name('orders.approve');
Route::put('/orders/reject/{id}', [OrderController::class, 'reject'])->name('orders.reject');


// USERS

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');


// PRODUCTS

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Route::resource('products', ProductController::class);
Route::put('products/{id}/toggle-status', [ProductController::class, 'toggleStatus'])->name('products.toggleStatus');
Route::get('/', [IndexController::class, 'index'])->name('index.index');


// CART

Route::get('cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('cart/index', [CartController::class, 'view'])->name('cart.index');
Route::post('cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');


// ORDER


Route::post('order/create', [OrderController::class, 'store'])->name('order.create');




Auth::routes();


