<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\ListController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\ApiController;
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

Route::POST('login',[LoginController::class,'login_user']);
Route::GET('all-details',[ListController::class,'alldetails'])->middleware('auth:sanctum');
Route::GET('product-details',[ListController::class,'productdetails'])->middleware('auth:sanctum');
Route::get('product-list/{category_id}',[ListController::class,'productlist'])->middleware('auth:sanctum');
Route::post('add_cart', [CartController::class ,'add_cart'])->middleware('auth:sanctum');
Route::post('cartdetails',[CartController::class,'cartdetails'])->middleware('auth:sanctum');
Route::get('transaction', [CheckoutController::class,'processTransaction'])->middleware('auth:sanctum');
 

 