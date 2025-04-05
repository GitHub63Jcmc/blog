<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return "Hola desde la página de posts";
    }
    public function create()
    {
        return "Aqui se mostrará el formulario para crear un post";
    }
    public function store()
    {
        return "Aqui se procesará el formulario para crear un post";
    }
    public function show($post)
    {
        return "Aqui se mostrará el post: $post";
    }
    public function edit($post)
    {
        return "Aqui se mostrará el formulario para editar un post: $post";
    }
    public function update($post)
    {
        return "Aqui se mostrará el formulario para editar un post: $post";
    }
    public function destroy($post)
    {
        return "Aqui se eliminar el post: $post";
    }

}
