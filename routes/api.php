<?php

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

//items
Route::get('/items', [\App\Http\Controllers\ItemController::class, 'index']);
Route::post('/item', [\App\Http\Controllers\ItemController::class, 'store']);
Route::get('/item/{id}', [\App\Http\Controllers\ItemController::class, 'getItemById']);
Route::get('/item/category/{category_id}', [\App\Http\Controllers\ItemController::class, 'getItemsByCategoryId']);
Route::delete('/item/{id}', [\App\Http\Controllers\ItemController::class, 'destroy']);

//category
Route::get('/category', [\App\Http\Controllers\ItemCategoryController::class, 'index']);
Route::post('/category', [\App\Http\Controllers\ItemCategoryController::class, 'store']);
Route::get('/category/{id}', [\App\Http\Controllers\ItemCategoryController::class, 'getItemById']);
Route::delete('/category/{id}', [\App\Http\Controllers\ItemCategoryController::class, 'destroy']);

//customer
Route::get('/customer', [\App\Http\Controllers\CustomerController::class, 'index']);
Route::post('/customer', [\App\Http\Controllers\CustomerController::class, 'store']);
Route::get('/customer/{id}', [\App\Http\Controllers\CustomerController::class, 'getItemById']);
Route::delete('/customer/{id}', [\App\Http\Controllers\CustomerController::class, 'destroy']);

//order
Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index']);
Route::post('/order', [\App\Http\Controllers\OrderController::class, 'store']);
Route::get('/order/{id}', [\App\Http\Controllers\OrderController::class, 'getItemById']);
Route::delete('/order/{id}', [\App\Http\Controllers\OrderController::class, 'destroy']);

//OrderStatus
Route::get('/orderStatus', [\App\Http\Controllers\OrderStatusController::class, 'index']);
Route::post('/orderStatus', [\App\Http\Controllers\OrderStatusController::class, 'store']);
Route::get('/orderStatus/{id}', [\App\Http\Controllers\OrderStatusController::class, 'getItemById']);
Route::delete('/orderStatus/{id}', [\App\Http\Controllers\OrderStatusController::class, 'destroy']);

//Reservation
Route::get('/reservation', [\App\Http\Controllers\ReservationController::class, 'index']);
Route::post('/reservation', [\App\Http\Controllers\ReservationController::class, 'store']);
Route::get('/reservation/{id}', [\App\Http\Controllers\ReservationController::class, 'getItemById']);
Route::delete('/reservation/{id}', [\App\Http\Controllers\ReservationController::class, 'destroy']);
