<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\productController;
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

Route::get('/', [productController::class,'index'])->name('products.index');
Route::get('/products/create', [productController::class,'create'])->name('products.create');
Route::post('/products/store', [productController::class,'store'])->name('products.store');
Route::get("products/{id}/edit", [productController::class,'Edit'])->name('products.edit');
Route::put("products/{id}/update", [productController::class,'update'])->name('products.update');

Route::get('/delete/{id}',[productController::class,"Delete"])->name('delete');

// Category Route Here....(Resource Route)

Route::resource('/categories',CategoryController::class);



