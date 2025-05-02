<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;

Route::get('/', function () {
    return view('Admin.dashboard');
})->name('dashboard');

Route::resource('categories', CategoryController::class);

Route::resource('posts', PostController::class);
