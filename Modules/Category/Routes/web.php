<?php
use Modules\Category\Http\Controllers\Admin\CategoryController;
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

Route::prefix('category')->group(function() {
   Route::get('/all' , [CategoryController::class , 'index'])->name('all.category');
   Route::get('/create' , [CategoryController::class , 'create'])->name('create.category');
   Route::post('/add' , [CategoryController::class ,'perform'])->name('add.category');
   Route::get('/edit/{id}' , [CategoryController::class , 'edit'])->name('edit.category');
   Route::post('/update' , [CategoryController::class , 'update'])->name('update.category');
   Route::get('/delete/{id}' , [CategoryController::class , 'delete'])->name('delete.category');
});
