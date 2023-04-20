<?php
  use Modules\Product\Http\Controllers\Admin\ProductController;
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

Route::prefix('product')->group(function () {
  Route::get('/all' , [ProductController::class , 'index'])->name('all.product');
  Route::get('/create' , [ProductController::class , 'create'])->name('create.product');
  Route::post('/add' , [ProductController::class , 'perform'])->name('add.product');
  Route::get('/edit/{id}' , [ProductController::class , 'Edit'])->name('edit.product');
  Route::post('/update' , [ProductController::class , 'update'])->name('update.product');
  Route::get('/delete/{id}' , [ProductController::class , 'delete'])->name('delete.product');
});