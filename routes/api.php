<?php

use App\Http\Controllers\Api\ApiAboutController;
use App\Http\Controllers\Api\ApiProductCategoryController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiTransactionController;
use App\Http\Controllers\Api\CheckOutController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\HowToOrderController;
use App\Http\Controllers\Api\RajaOngkirController;
use App\Http\Controllers\Api\RefundPolicyController;
use App\Http\Controllers\Api\V1\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('v1')->group(function () {
    Route::get('home', [IndexController::class,'home']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('products/all', [ApiProductController::class, 'indexGetAll']);
Route::get('products', [ApiProductController::class, 'index']);
Route::get('products/is_sale', [ApiProductController::class, 'indexGetSale']);

Route::get('provinces', [RajaOngkirController::class, 'provinces']);
Route::get('cities', [RajaOngkirController::class, 'cities']);
Route::get('cost', [RajaOngkirController::class, 'cost']);
Route::get('about', [ApiAboutController::class, 'index']);
Route::get('contacts', [ContactController::class, 'index']);
Route::get('how_to_order', [HowToOrderController::class, 'index']);
Route::get('products/{slug}', [ApiProductController::class, 'detail']);
Route::get('productcategories', [ApiProductCategoryController::class, 'index']);
Route::post('checkout', [CheckOutController::class, 'checkout']);
Route::get('transactions', [ApiTransactionController::class, 'index']);
Route::get('transactions/{uuid}', [ApiTransactionController::class, 'show']);

Route::get('refund_policies', [RefundPolicyController::class, 'index']);

Route::get('faqs', [FaqController::class, 'index']);

Route::get('home', [HomeController::class, 'index']);
Route::get('send_email', [HomeController::class, 'send_email']);
