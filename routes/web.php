<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

// Route::prefix('posts')->name('posts.')->controller(PostController::class)->group(function() {

Route::resource('posts', PostController::class);
Route::get('/prueba', function(){
     
    $users = DB::table('users')
    ->paginate(15, ['*'], 'pageUsers');

    // return $users;

    return view('prueba', compact('users'));

});


