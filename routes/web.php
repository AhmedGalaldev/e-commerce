<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PaymentController;
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

// add to cart
Route::get('products/addToCart/{id}', [ProductsController::class, 'addToCart'])->name('addToCart');
Route::get('products/cart', [ProductsController::class, 'showCart'])->name('showCart');
// delete from cart
Route::get('products/deletefromcart/{id}', [ProductsController::class, 'deleteItemFromCart'])->name('deleteItemFromCart');

// increase cart product quantity

Route::get('products/increaseSingleProduct/{id}', [ProductsController::class, 'increaseSingleProduct'])->name('increaseSingleProduct');

// decrease cart product quantity
Route::get('products/decreaseSingleProduct/{id}', [ProductsController::class, 'decreaseSingleProduct'])->name('decreaseSingleProduct');

// create order
Route::post('products/createOrder', [ProductsController::class, 'createOrder'])->name('createOrder');

// ceackout page
Route::get('products/checkoutProducts', [ProductsController::class, 'checkoutProducts'])->name('checkoutProducts');


//payment page

Route::get('payments/paymentPage', [PaymentController::class, 'showPaymentPage'])->name('paymentPage');


//search products

Route::get('products/search', [ProductsController::class, 'searchProducts'])->name('searchProducts');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// admin routes


Route::group(['middleware' => ['admin']], function () {
    //

    Route::get('admin/products', [AdminController::class, 'index'])->name('adminProducts.index');
    Route::get('admin/create', [AdminController::class, 'create'])->name('adminProducts.create');
    Route::post('admin/products', [AdminController::class, 'store'])->name('adminProducts.store');
    Route::get('admin/products/{prodcut}/edit', [AdminController::class, 'edit'])->name('adminProducts.edit');
    Route::patch('admin/products/{prodcut}', [AdminController::class, 'update'])->name('adminProducts.update');
    Route::delete('admin/products/{product}', [AdminController::class, 'destroy'])->name('adminProducts.destroy');
});


Route::get('admin/edit', function () {
    return view('admin.edit');
});
