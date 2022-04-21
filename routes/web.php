<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::get('/',[FrontendController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Category Management
|
*/
Route::group(['prefix' => 'admin', 'middlewar' => 'auth'], function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/store', [CategoryController::class, 'insert'])->name('category.store');
    Route::get('/category/edit/{category_id}', [CategoryController::class, 'editcategory']);
    Route::post('/category/update', [CategoryController::class, 'updatecategory'])->name('category.update');
    Route::get('/category/delete/{category_id}', [CategoryController::class, 'deletecategory']);
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|Post Management
|
*/

Route::group(['prefix' => 'admin', 'middlewar' => 'auth'], function () {
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::post('/post/store', [PostController::class, 'insert'])->name('post.store');
    Route::get('/post/view', [PostController::class, 'show'])->name('post.show');
    Route::get('/post/edit/{id}', [PostController::class, 'editpost']);
    Route::post('/post/update', [PostController::class, 'updatepost'])->name('post.update');
    Route::get('/post/delete/{id}', [PostController::class, 'deletepost']);
});
