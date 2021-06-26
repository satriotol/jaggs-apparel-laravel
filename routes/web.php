<?php

use App\Http\Controllers\AgeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
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



Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::resources([
        'product' => ProductController::class,
        'productcategory' => ProductCategoryController::class,
        'age' => AgeController::class
    ]);
    Route::get('quantity/create/{product}', [ProductController::class, 'quantity_create'])->name('quantity.create');
    Route::post('quantity/create/', [ProductController::class, 'quantity_store'])->name('quantity.store');
});
