<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    // Metodos polimorficos    
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function image(): morphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function tags(): morphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
