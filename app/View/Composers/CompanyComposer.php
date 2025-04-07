<?php

namespace App\View\Composers;

use Illuminate\View\View;

class CompanyComposer
{
    public function compose(View $view) : void
    {
        $view->with('prueba2', 'Este es un mensaje de prueba 2');
    }
}