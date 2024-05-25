<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Order;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('settings', [SettingController::class, 'update']);

Route::resource('users', UserController::class);
Route::post('users/{user}/change-status', [UserController::class, 'changeStatus']);

Route::resource('categories', CategoryController::class);
Route::resource('/products',ProductController::class);

Route::get('orders',[OrderController::class,'index'])->name('orders.index');
Route::delete('orders/{id}',[OrderController::class,'destroy'])->name('orders.destroy');
Route::post('orders/{order}/change-status', [OrderController::class, 'changeStatus']);

