<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Contact\Http\Controllers\Api\ApiController;
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

// Route::middleware('auth:api')->get('/contact', function (Request $request) {
//     return $request->user();
// });

Route::post('/contactApi' , [ApiController::class , 'ApiContact']);