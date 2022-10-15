<?php

use App\Http\Controllers\v1\CompanyController;
use App\Http\Controllers\v1\CompanyProductController;
use App\Http\Controllers\v1\OrderController;
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

Route::post('get-my-details', [CompanyController::class, 'index']);
Route::post('get-my-products', [CompanyProductController::class, 'getDetailsByCompanyUuid']);
Route::post('order', [OrderController::class, 'store']);
Route::post('get-my-order', [OrderController::class, 'getOrders']);
