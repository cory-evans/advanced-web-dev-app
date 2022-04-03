<?php

use App\Http\Controllers\ForumPostController;
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
})->name('index');

Route::prefix('/shop')->group(function () {
    Route::get('/', function() {
        return view('shop.index');
    })->name('shop');
});

Route::prefix('/forum')->group(function() {
    Route::get('/', [ForumPostController::class, 'index'])
        ->name('forum');
    Route::get('/post', [ForumPostController::class, 'create'])
        ->name('forum.createPost');
    Route::get('/post/{forumPost}', [ForumPostController::class, 'show'])
        ->name('forum.showPost');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
