<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

// Route::prefix('posts')->name('posts.')->controller(PostController::class)->group(function() {

Route::resource('posts', PostController::class);
Route::get('/prueba', function(){
     
    $prueba = null;

    return DB::table('users')
        ->when($prueba, function($query, $prueba){
            $query->where('id', '>=', $prueba);
        })
        ->get();
});



