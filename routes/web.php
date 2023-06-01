<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
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




// category routes for admin
Route::get('/admin/category/all',[CategoryController::class,'index'])->name('category.all');
Route::get('/admin/category/add',[CategoryController::class,'create'])->name('category.add');
Route::post('/admin/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/admin/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/admin/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/admin/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
Route::get('/admin/category/trashed',[CategoryController::class,'trashed'])->name('category.trashed');
Route::get('/admin/category/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
Route::get('/admin/category/destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

// post routes for admin
Route::get('/admin/post/all',[PostController::class,'index'])->name('post.all');
Route::get('/admin/post/add',[PostController::class,'create'])->name('post.add');
Route::post('/admin/post/store',[PostController::class,'store'])->name('post.store');
Route::get('/admin/post/edit/{id}',[PostController::class,'edit'])->name('post.edit');
Route::post('/admin/post/update/{id}',[PostController::class,'update'])->name('post.update');
Route::get('/admin/post/delete/{id}',[PostController::class,'delete'])->name('post.delete');
Route::get('/admin/post/trashed',[PostController::class,'trashed'])->name('post.trashed');
Route::get('/admin/post/restore/{id}',[PostController::class,'restore'])->name('post.restore');
Route::get('/admin/post/destroy/{id}',[PostController::class,'destroy'])->name('post.destroy');
