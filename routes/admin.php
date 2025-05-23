<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PermissionController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('Admin.dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('permissions', PermissionController::class);
});


// Route::get('/', function () {
//     return view('Admin.dashboard');
// })->name('dashboard');

// Route::resource('categories', CategoryController::class);

// Route::resource('posts', PostController::class);
