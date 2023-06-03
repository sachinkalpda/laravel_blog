<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Models\Admin;
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







// route for admin user
Route::get('/admin/register', [AdminController::class, 'create'])->name('admin.register');
Route::get('/admin/login', [AdminController::class, 'loginView'])->name('admin.login.view');
Route::post('/admin/create-session', [AdminController::class, 'login'])->name('admin.login');



Route::middleware(['AdminAuth'])->group(function () {

    // Admin protected routes
    Route::get('/admin/dashboard', function () {
        return view('admin/dashboard');
    });
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/author/all', [AdminController::class, 'index'])->name('admin.all');
    Route::get('/admin/register/author', [AdminController::class, 'registerAuthor'])->name('admin.register.author');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/author/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/author/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/author/password/change/{id}', [AdminController::class, 'renderChangePassword'])->name('admin.change.password');
    Route::post('/admin/author/password/update/{id}', [AdminController::class, 'updatePassword'])->name('admin.update.password');
    Route::get('/admin/author/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::get('/admin/author/trashed', [AdminController::class, 'trashed'])->name('admin.trashed');
    Route::get('/admin/author/restore/{id}', [AdminController::class, 'restore'])->name('admin.restore');
    Route::get('/admin/author/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // category routes for admin
    Route::get('/admin/category/all', [CategoryController::class, 'index'])->name('category.all');
    Route::get('/admin/category/add', [CategoryController::class, 'create'])->name('category.add');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/admin/category/trashed', [CategoryController::class, 'trashed'])->name('category.trashed');
    Route::get('/admin/category/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('/admin/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // post routes for admin
    Route::get('/admin/post/all', [PostController::class, 'index'])->name('post.all');
    Route::get('/admin/post/add', [PostController::class, 'create'])->name('post.add');
    Route::post('/admin/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/admin/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/admin/post/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::get('/admin/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
    Route::get('/admin/post/trashed', [PostController::class, 'trashed'])->name('post.trashed');
    Route::get('/admin/post/restore/{id}', [PostController::class, 'restore'])->name('post.restore');
    Route::get('/admin/post/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');
});
