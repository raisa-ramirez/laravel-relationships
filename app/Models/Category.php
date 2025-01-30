<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }
}
