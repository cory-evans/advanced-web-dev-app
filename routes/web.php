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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/forum')->group(function() {
    Route::get('/', [ForumPostController::class, 'index'])
        ->name('forum.index');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
