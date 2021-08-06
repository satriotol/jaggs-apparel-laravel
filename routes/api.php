<?php

use App\Http\Controllers\Api\ApiAboutController;
use App\Http\Controllers\Api\ApiProductCategoryController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\CheckOutController;
use App\Http\Controllers\Api\RajaOngkirController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('products', [ApiProductController::class, 'index']);
Route::get('provinces', [RajaOngkirController::class, 'provinces']);
Route::get('cities', [RajaOngkirController::class, 'cities']);
Route::get('cost', [RajaOngkirController::class, 'cost']);
Route::get('about', [ApiAboutController::class, 'index']);
Route::get('products/{slug}', [ApiProductController::class, 'detail']);
Route::get('productcategories', [ApiProductCategoryController::class, 'index']);
Route::post('checkout', [CheckOutController::class, 'checkout']);
