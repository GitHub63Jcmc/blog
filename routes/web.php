<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

// Route::prefix('posts')->name('posts.')->controller(PostController::class)->group(function() {

Route::resource('posts', PostController::class);
Route::get('/prueba', function(){
     
    DB::table('users')->upsert(
        [
            'name' => 'Joao Cabral',
            'last_name' => 'de Matos Carvalho',
            'email' => 'joaocabral@devfullstack.com',
            'password' => bcrypt('123456789')
        ],
        [
            'email'
        ],
        [
            'name',
            'last_name'
        ]
    );

    return 'Usuario creado o actualizado correctamente';
});



