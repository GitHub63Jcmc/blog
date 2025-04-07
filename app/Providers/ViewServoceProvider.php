<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\View\Composers\CompanyComposer;
use Illuminate\Support\ServiceProvider;

class ViewServoceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::share('prueba', 'Este es una mensaje de prueba');

        View::composer(['welcome'], CompanyComposer::class);
    }
}
