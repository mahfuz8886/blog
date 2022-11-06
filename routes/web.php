<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontendController::class, 'index']);
Route::get('/tutorial/{category_slug}', [FrontendController::class, 'viewCategoryPost']);
Route::get('/tutorial/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost']);

/*
    |--------------------------------------------------------------------------
    | Comment System
    |--------------------------------------------------------------------------
*/
Route::post('comments', [CommentController::class, 'store']);
Route::post('delete-comment', [CommentController::class, 'destroy']);   


// Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {

//     Route::get('/dashboard', [DashboardController::class, 'index']);
//     Route::post('store', [DashboardController::class, 'addNewProduct'])->name('store');
// });



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Category CRUD
    |--------------------------------------------------------------------------
    */
    Route::get('category', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'create']);
    Route::post('add-category', [CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [CategoryController::class, 'update']);
    Route::post('delete-category', [CategoryController::class, 'destroy']);
    /*
    |--------------------------------------------------------------------------
    | Post CRUD
    |--------------------------------------------------------------------------
    */
    Route::get('post', [PostController::class, 'index']);
    Route::get('add-post', [PostController::class, 'create']);
    Route::post('add-post', [PostController::class, 'store']);
    Route::get('edit-post/{post_id}', [PostController::class, 'edit']);
    Route::put('update-post/{post_id}', [PostController::class, 'update']);
    Route::get('delete-post/{post_id}', [PostController::class, 'destroy']);

    Route::get('users', [UserController::class, 'index']);
    Route::get('edit-user/{user_id}', [UserController::class, 'edit']);
    Route::put('edit-user/{user_id}', [UserController::class, 'update']);


    /*
        |--------------------------------------------------------------------------
        | Setting
        |--------------------------------------------------------------------------
    */
    Route::get('settings', [SettingController::class, 'index']);
    //Route::get('add-post', [PostController::class, 'create']);
    Route::post('settings', [SettingController::class, 'store']);
});
