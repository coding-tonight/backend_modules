<?php
 use Modules\Auth\Http\Controllers\Admin\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest'] , function () {
    Route::get('/login', [AuthController::class , 'index'])->name('login');
    Route::post('/login' , [AuthController::class , 'login'])->name('adminlogin');
});

Route::group(['middleware' => 'auth'] , function () {
    Route::get('/logout' , [AuthController::class , 'logout'])->name('logout');
});
