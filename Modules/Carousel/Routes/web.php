<?php
use  Modules\Carousel\Http\Controllers\Admin\CarouselController;
use Illuminate\Support\Facades\Route;
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

Route::prefix('carousel')->group(function () {
  Route::get('/all' , [CarouselController::class , 'index'])->name('all.carousel');
  Route::get('/create' , [CarouselController::class , 'create'])->name('create.carousel');
  Route::post('/add' , [CarouselController::class , 'add'])->name('add.carousel');
  Route::post('edit/{id}' , [CarouselController::class , 'edit'])->name('edit.carousel');
  Route::get('/delete/{id}' , [CarouselController::class , 'delete'])->name('delete.carousel');
});