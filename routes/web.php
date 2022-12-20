<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('category/')->group(function(){
    Route::get('/{slug}', [HomeController::class, 'category'])->name('category');
    Route::get('/{slug}/{id}', [HomeController::class, 'viewProduct'])->name('view-product');
});
Route::middleware(['auth'])->group(function (){
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

Route::middleware(['auth', 'isCustomer'])->group(function (){
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('add-to-cart/{product_id}', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::delete('delete-from-cart/{item_id}', [CartController::class, 'destroyItem'])->name('delete-from-cart');
    // Route::get('delete-cart/{cart_id}', [CartController::class, 'destroy'])->name('delete-cart');

    Route::get('/history', [TransactionController::class, 'index'])->name('history');
    Route::post('add-to-transaction/{cart_id}', [TransactionController::class, 'addToTransaction'])->name('add-to-transaction');
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin/manageProduct/')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('manageProduct');
    Route::post('/insert-category', [CategoryController::class, 'insert'])->name('insert-category');
    Route::get('/add-product', [ProductController::class, 'add'])->name('add-product');
    Route::post('/insert-product', [ProductController::class, 'insert'])->name('insert-product');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
    Route::patch('/update-product/{id}', [ProductController::class, 'update'])->name('update-product');
    Route::delete('/delete-product/{id}', [ProductController::class, 'destroy'])->name('delete-product');
});