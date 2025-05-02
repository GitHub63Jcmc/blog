<?php

use App\Models\Post;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Route::get('/prueba', function () {
//     $path = 'articles/imagen123.jpg';
//     $target = 'posts/imagen123.jpg';

//     Storage::move($path, $target);

//     return "IMAGEN COPIADA";
// });

Route::get('/prueba/{post}', function(Post $post) {
    return Storage::download($post->image_path);
})->name('prueba');

require __DIR__.'/auth.php';
