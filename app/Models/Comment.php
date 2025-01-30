<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;
   
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function commentable(): morphTo
    {
        return $this->morphTo();
    }
}
