<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return "Hola Desde la página Principal";
    // }
    public function __invoke()
    {
        return "Hola Desde la página Principal";
    }
}