<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
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

// all products
Route::get('products', [ProductsController::class, 'index'])->name('allProducts');

//for category 

Route::get('products/category/{id}', [CategoriesController::class, 'getProductsByCategory'])->name('productsCategory');


// for brand
Route::get('products/brand/{id}', [BrandsController::class, 'getProductsByBrand'])->name('productsBrand');
