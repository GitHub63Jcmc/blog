<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relaciones uno a muchos
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //Relación muchos a muchos
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
