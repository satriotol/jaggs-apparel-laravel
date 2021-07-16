<?php

use App\Http\Controllers\AgeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
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
    })->name('dashboard');
    Route::resources([
        'product' => ProductController::class,
        'productcategory' => ProductCategoryController::class,
        'age' => AgeController::class,
        'size' => SizeController::class

    ]);
    Route::resource('gallery', GalleryController::class)->except(['create', 'store']);
    // Route::get('quantity/create/{product}', [ProductController::class, 'quantity_create'])->name('quantity.create');
    // Route::post('quantity/create/', [ProductController::class, 'quantity_store'])->name('quantity.store');
    // Route::delete('quantity/delete/{quantity}', [ProductController::class, 'quantity_destroy'])->name('quantity.destroy');
    Route::get('gallery/create/{product}', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('gallery/create/', [GalleryController::class, 'store'])->name('gallery.store');
});
