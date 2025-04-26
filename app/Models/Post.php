<?php

namespace App\Models;

use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[ObservedBy(PostObserver::class)]
class Post extends Model
{

    use HasFactory;

    protected $fillable = [
        'title', 
        'slug', 
        'image_path',
        'excerpt',
        'content',
        'is_published',
        'published_at',
        'user_id',
        'category_id'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Relacion uno a muchos inversa
    protected function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relaciones uno a muchos
    protected function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //Relación muchos a muchos
    protected function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
