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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list-products', function () {
    return view('list_products');
});

Route::get('/add-product', function () {
    return view('add_product');
});

Route::get('/edit-product', function () {
    return view('edit_product');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'addProduct']);

Route::get('/fetch-product/{id}', [App\Http\Controllers\ProductController::class, 'fetchProduct']);

Route::post('/edit-product', [App\Http\Controllers\ProductController::class, 'editProduct']);