<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::get('/', function() {
    return "Hola desde la página de inicio";

    // return view('welcome');
});
Route::get('/contacto', function() {
    return "Hola desde la página de contacto usando GET";
});

Route::get('/cursos/informacion', function() {
    return "Aqui podrás encontrar toda la información de los cursos";
});

Route::get('/cursos/{curso}', function($curso) {
 
    return "Bienvenido al curso: $curso";
});






