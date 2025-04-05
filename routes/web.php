<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// // Ruta para mostrar el listado de registros
// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// // Ruta para mostrar un formulario para crear un registro
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// // Ruta para guardar un registro
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// // Ruta para mostrar un registro
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// // Ruta para mostrar un formulario para editar un registro
// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// // Ruta para actualizar un registros
// Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

// // Ruta para eliminar un registros
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::resource('$articulos', PostController::class)
    ->parameters(['articulos' => 'post'])
    ->names('posts');




