<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::get('/localization/{language}', LocalizationController::class)->name('localization.switch');

// Blog
Route::get('/', [BlogController::class, 'home'])->name('blog.home');
// Categories
Route::get('/categories', [BlogController::class, 'showCategories'])->name('blog.categories');
// Tags
Route::get('/tags', [BlogController::class, 'showTags'])->name('blog.tags');
// Search Post
Route::get('/search', [BlogController::class, 'searchPosts'])->name('blog.search');
// Tags [slug]
Route::get('/tags/{slug}', [BlogController::class, 'showPostsByTag'])->name('blog.posts.tag');
// show post by category [slug]
Route::get('/search/{slug}', [BlogController::class, 'showPostsByCategory'])->name('blog.posts.category');
// show post detail
Route::get('/post/{slug}', [BlogController::class, 'showPostDetail'])->name('blog.posts.detail');

Auth::routes([
    'register' => false
]);

// dashboard group
Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    // categories
    Route::get('/categories/select', [CategoryController::class, 'select'])->name('categories.select');
    Route::resource('/categories', CategoryController::class);
    // tags
    Route::resource('/tags', TagController::class)->except(['show']);
    Route::get('/tags/select', [TagController::class, 'select'])->name('tags.select');
    // posts
    Route::resource('/posts', PostController::class);

    // file-manager
    Route::group(['prefix' => 'filemanager'], function () {
        Route::get('/index', [FileManagerController::class, 'index'])->name('filemanager.index');
        // \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    // users
    Route::resource('/users', UserController::class)->except(['show']);
    // roles
    Route::get('/roles/select', [RoleController::class, 'select'])->name('roles.select');
    Route::resource('/roles', RoleController::class);
});
