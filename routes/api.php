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
Route::Get('/item/{id}', [\App\Http\Controllers\ItemController::class, 'getItemById']);
Route::Delete('/item/{id}', [\App\Http\Controllers\ItemController::class, 'destroy']);

//category
Route::get('/category', [\App\Http\Controllers\ItemCategoryController::class, 'index']);
Route::post('/category', [\App\Http\Controllers\ItemCategoryController::class, 'store']);
Route::Get('/category/{id}', [\App\Http\Controllers\ItemCategoryController::class, 'getItemById']);
Route::Delete('/category/{id}', [\App\Http\Controllers\ItemCategoryController::class, 'destroy']);

//customer
Route::get('/customer', [\App\Http\Controllers\CustomerController::class, 'index']);
Route::post('/customer', [\App\Http\Controllers\CustomerController::class, 'store']);
Route::Get('/customer/{id}', [\App\Http\Controllers\CustomerController::class, 'getItemById']);
Route::Delete('/customer/{id}', [\App\Http\Controllers\CustomerController::class, 'destroy']);

//order
Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index']);
Route::post('/order', [\App\Http\Controllers\OrderController::class, 'store']);
Route::Get('/order/{id}', [\App\Http\Controllers\OrderController::class, 'getItemById']);
Route::Delete('/order/{id}', [\App\Http\Controllers\OrderController::class, 'destroy']);

//OrderStatus
Route::get('/orderStatus', [\App\Http\Controllers\OrderStatusController::class, 'index']);
Route::post('/orderStatus', [\App\Http\Controllers\OrderStatusController::class, 'store']);
Route::Get('/orderStatus/{id}', [\App\Http\Controllers\OrderStatusController::class, 'getItemById']);
Route::Delete('/orderStatus/{id}', [\App\Http\Controllers\OrderStatusController::class, 'destroy']);

//Reservation
Route::get('/reservation', [\App\Http\Controllers\ReservationController::class, 'index']);
Route::post('/reservation', [\App\Http\Controllers\ReservationController::class, 'store']);
Route::Get('/reservation/{id}', [\App\Http\Controllers\ReservationController::class, 'getItemById']);
Route::Delete('/reservation/{id}', [\App\Http\Controllers\ReservationController::class, 'destroy']);
