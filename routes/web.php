<?php

use App\Http\Controllers\ForumPostCommentController;
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\ShopProductController;
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

Route::get('/', [ShopProductController::class, 'index'])->name('shop');
Route::prefix('/shop')->group(function () {
    Route::get('/{shopProduct}', [ShopProductController::class, 'show'])->name('shop.product.show');
});

Route::prefix('/forum')->group(function() {
    Route::get('/', [ForumPostController::class, 'index'])
        ->name('forum');
    Route::get('/post', [ForumPostController::class, 'create'])
        ->name('forum.post.create');
    Route::get('/post/{forumPost}', [ForumPostController::class, 'show'])
        ->name('forum.post.show');
    Route::post('/post/{forumPost}/comment', [ForumPostCommentController::class, 'store'])
        ->name('forum.post.comment.store');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
