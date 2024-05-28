<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('checkout',[OrderController::class,'store'])->middleware('auth:sanctum');
Route::get('orders',[OrderController::class,'show'])->middleware('auth:sanctum');

Route::get('homepage/products',[ProductController::class,'index']);
Route::get('products',[ProductController::class,'all_products']);
Route::get('products/{slug}',[ProductController::class,'show']);

Route::get('categories',[CategoryController::class,'index']);

Route::get('cart', [CartController::class,'getCart']);
Route::post('cart', [CartController::class,'store']);
Route::post('cart/update', [CartController::class,'update']);
Route::delete('cart/{cart_id}', [CartController::class,'destroy']);
Route::delete('cart/{cart_id}/item/{item_id}', [CartController::class,'destroyItem']);
