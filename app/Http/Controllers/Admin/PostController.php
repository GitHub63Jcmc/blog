<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest('id')->paginate();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data['user_id'] = auth('web')->id(); 

        $post = Post::create($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Post creado!',
            'text' => 'El post se ha creado correctamente.',
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = $post->tags->pluck('id')->toArray();

        // $response = in_array(3, $tags);
        // dd($response);

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required_if:is_published,1|string',
            'content' => 'required_if:is_published,1|string',
            'tags' => 'array',
            'is_published' => 'boolean',
        ]);

        $post->update($data);

        $tags = [];

        foreach ($request->tags ?? [] as $tag) {
            $tags[] = Tag::firstOrCreate(['name' => $tag]);
        }

        $post->tags()->sync($tags);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Post actualizado!',
            'text' => 'El post se ha actualizado correctamente.',
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    public function destroy(Post $post)
    {
        //
    }
}
