<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::view('/add-product', 'add_product' );

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'addProduct']);

Route::get('/fetch-product/{id}', [App\Http\Controllers\ProductController::class, 'fetchProduct']);

Route::post('/edit-product', [App\Http\Controllers\ProductController::class, 'editProduct']);

Route::post('/delete-product', [App\Http\Controllers\ProductController::class, 'deleteProduct']);