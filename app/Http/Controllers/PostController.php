<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $post->load('category', 'user', 'comments');

        $tagIds = $post->tags->pluck('id');

        $relatedPosts = Post::where('id', '!=', $post->id)
            ->whereHas('tags', function ($query) use ($tagIds) {
                $query->whereIn('tags.id', $tagIds);
            })
            ->with('category', 'tags')
            ->latest()
            ->take(4)
            ->get();

        if ($relatedPosts->count() < 4) {
            $additionalPosts = Post::where('id', '!=', $post->id)
                ->where('category_id', $post->category_id)
                ->whereNotIn('id', $relatedPosts->pluck('id'))
                ->latest()
                ->take(4 - $relatedPosts->count())
                ->get();

            $relatedPosts = $relatedPosts->merge($additionalPosts);
        }

        return view('posts.show', compact('post', 'relatedPosts'));
    }
}