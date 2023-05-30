<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/dashboard',function(){
    return view('admin/dashboard');
});





Route::get('/admin/category/all',[CategoryController::class,'index'])->name('category.all');
Route::get('/admin/category/add',[CategoryController::class,'create'])->name('category.add');
Route::post('/admin/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/admin/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/admin/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/admin/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
Route::get('/admin/category/trashed',[CategoryController::class,'trashed'])->name('category.trashed');
Route::get('/admin/category/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
Route::get('/admin/category/destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
