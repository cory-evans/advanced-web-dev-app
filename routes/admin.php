<?php

use App\Http\Controllers\Admin\AdminForumPost;
use App\Http\Controllers\Admin\AdminShopProduct;
use App\Http\Controllers\Admin\AdminUsers;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin')->name('admin.')->prefix('/admin')->group(function() {
    Route::resource('products', AdminShopProduct::class);
    Route::resource('forum', AdminForumPost::class);
    Route::resource('users', AdminUsers::class);

    Route::get('media/search', [MediaController::class, 'search'])
        ->name('media.search');
    Route::resource('media', MediaController::class);
});
