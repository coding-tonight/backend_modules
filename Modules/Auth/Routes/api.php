<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Api\ApiController;

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

// Route::middleware('auth:api')->get('/auth', function (Request $request) {
//     return $request->user();
// });

Route::post('/Auth/login' , [ApiController::class , 'loginApi']);
Route::post('Auth/register' , [ApiController::class , 'registerApi']);

Route::get('/Auth/user' , [ApiController::class , 'Auth'])->middleware('auth:api');
