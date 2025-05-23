<?php

// namespace App\Providers;

// use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\Route;

// class RouteServiceProvider extends ServiceProvider
// {
//     public function boot(): void
//     {
//         $this->mapAdminRoutes();
//     }

//     protected function mapAdminRoutes(): void
//     {
//         Route::middleware(['web', 'auth'])
//             ->prefix('admin')
//             ->name('admin.')
//             ->group(base_path('routes/admin.php'));
//     }
// }


namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
public function boot(): void
{
    parent::boot();

    Route::middleware('web')
        ->group(base_path('routes/web.php'));

    Route::middleware('web') // <-- importante para sesiones y auth
        ->prefix('admin')    // <-- si ya está en el archivo, aquí puede omitirse
        ->group(base_path('routes/admin.php'));
}
}
