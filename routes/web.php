<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin', 'middlewar' => 'auth'], function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/store', [CategoryController::class, 'insert'])->name('category.store');
    Route::get('/category/edit/{category_id}', [CategoryController::class, 'editcategory']);
    Route::post('/category/update', [CategoryController::class, 'updatecategory'])->name('category.update');
    Route::get('/category/delete/{category_id}', [CategoryController::class, 'deletecategory']);
});

Route::group(['prefix' => 'admin', 'middlewar' => 'auth'], function () {
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::post('/post/store', [PostController::class, 'insert'])->name('post.store');
    Route::get('/post/view', [PostController::class, 'show'])->name('post.show');

});
