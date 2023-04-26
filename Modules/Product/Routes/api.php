<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Api\ApiController;

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

// Route::middleware('auth:api')->get('/product', function (Request $request) {
//     return $request->user();
// });
/* Products api */
Route::get('/productDetailApi/{id}' , [ApiController::class , 'ProductDetailApi']);
Route::get('/productApi/{section}' , [ApiController::class , 'ProductApi']);
Route::get('/search/{query}' ,[ApiController::class , 'search']);
/* Products api */