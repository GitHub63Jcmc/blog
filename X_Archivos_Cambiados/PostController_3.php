<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest('id')
            ->where('user_id', auth()->user()->id)
            ->paginate();

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

        Gate::authorize('author', $post);

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {

        Gate::authorize('author', $post);

        $data = $request->validate([
            'title' => 'required|string|max:255',

            'slug' => [
                Rule::requiredIf(function() use ($post) {
                    return !$post->published_at;
                }),
                'string',
                'max:255',
                Rule::unique('posts')
                    ->ignore($post->id),
            ],
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required_if:is_published,1|string',
            'content' => 'required_if:is_published,1|string',
            'tags' => 'array',
            'is_published' => 'boolean',
        ]);

        if($request->hasFile('image')) {

            if($post->image_path) { // Se tiene algo en image path
                Storage::delete($post->image_path);
            }

            $extension = $request->image->extension();
            $nameFile = $post->slug . '.' . $extension;

            while(Storage::exists('posts/' . $nameFile)) {
                $nameFile = str_replace('.' . $extension, '-copia.' . $extension, $nameFile);
            }

            // return $nameFile;

            $data['image_path'] = Storage::putFileAs('posts', $request->image, $nameFile);
        }

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
        Gate::authorize('author', $post);

        $post->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Post actualizado!',
            'text' => 'El post se ha eliminado correctamente.',
        ]);

        return redirect()->route('admin.posts.index');
    }
}


