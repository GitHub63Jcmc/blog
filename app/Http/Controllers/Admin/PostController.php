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
use Illuminate\Support\Str;

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

// ---------------------------------------------------------------------------------------------------
    public function show(Post $post)
    {
        Gate::authorize('admin', $post);

        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        Gate::authorize('admin', $post);

        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        Gate::authorize('admin', $post);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                Rule::requiredIf(!$post->published_at),
                'string',
                'max:255',
                Rule::unique('posts')->ignore($post->id),
            ],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nameFile = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

            while (Storage::exists("posts/{$nameFile}")) {
                $nameFile = str_replace('.' . $file->getClientOriginalExtension(), '-copia.' . $file->getClientOriginalExtension(), $nameFile);
            }

            $path = $file->storeAs('posts', $nameFile);

            // Elimina imagen anterior si existe
            if ($post->image_path) {
                Storage::delete($post->image_path);
            }

            $post->image_path = $path;
        }

        $post->title = $request->title;
        $post->slug = $post->published_at ? $post->slug : $request->slug;
        $post->content = $request->content;
        $post->save();

        $tagIds = collect($request->tags ?? [])->map(function ($tag) {
            return Tag::firstOrCreate(['name' => $tag])->id;
        });

        $post->tags()->sync($tagIds);

        return redirect()->route('posts.index')->with('status', [
            'type' => 'success',
            'title' => '¡Post actualizado!',
            'text' => 'El post se ha actualizado correctamente.',
        ]);
    }

    public function destroy(Post $post)
    {
        Gate::authorize('admin', $post);

        if ($post->image_path) {
            Storage::delete($post->image_path);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('status', [
            'type' => 'success',
            'title' => '¡Post eliminado!',
            'text' => 'El post se ha eliminado correctamente.',
        ]);
    }
}