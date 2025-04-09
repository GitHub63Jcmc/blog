<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = [
            [
                'title' => 'Post 1',
                'content' => 'Contenido del post 1',
            ],

            [
                'title' => 'Post 2',
                'content' => 'Contenido del post 2',
            ],
            [
                'title' => 'Post 3',
                'content' => 'Contenido del post 3'
            ]
        ];

        
        return view('posts.index', compact('posts'));
    }
    public function create(){
        return view('posts.create');
    }
    public function store(){
        return "Aqui se procesará el formulario para crear un post";
    }
    public function show($post){
        return view('posts.show', compact('post'));
    }
    public function edit($post){
        return view('posts.edit', compact('post'));
    }
    public function update($post){
        return "Aqui se mostrará el formulario para editar un post: $post";
    }
    public function destroy($post){
        return "Aqui se eliminar el post: $post";
    }

}
