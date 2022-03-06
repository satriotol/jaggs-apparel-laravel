<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSizeController;
use App\Http\Controllers\RefundPolicyController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
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
        'size' => SizeController::class,
        'transaction' => TransactionController::class,
        'about' => AboutController::class,
        'home' => HomeController::class,
        'sale' => SaleController::class,
        'contact' => ContactController::class,
        'social_media' => SocialMediaController::class,
    ]);
    Route::resource('gallery', GalleryController::class)->except(['create', 'store']);
    Route::resource('faq', FaqController::class);
    Route::resource('refund_policy', RefundPolicyController::class);
    Route::get('gallery/create/{product}', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('gallery/create/', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('quantity/create/{product}', [ProductSizeController::class, 'create'])->name('quantity.create');
    Route::post('quantity/create/', [ProductSizeController::class, 'store'])->name('quantity.store');

    Route::get('transaction/create/{transaction}', [TransactionDetailController::class, 'create'])->name('transactiondetail.create');
    Route::post('transaction/store/{transaction}', [TransactionDetailController::class, 'store'])->name('transactiondetail.store');
});
