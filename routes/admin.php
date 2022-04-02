<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function() {
    Route::get('admin', function() {
		return view('admin.index');
	})->name('admin.index');
});