<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', function() {
        return "this is admin";
    });

    Route::get('/manageProduct', function() {
        return "this is manage product";
    });

    Route::get('/manageProduct/addProduct', function() {
        return "this is manage product";
    });

    Route::get('/manageProduct/updateProduct', function() {
        return "this is manage product";
    });
});