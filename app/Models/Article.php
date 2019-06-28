<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'article_user')
            ->where('article_user.type', 'like')
            ->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function collections()
    {
        return $this->belongsToMany(User::class, 'article_user')
            ->where('article_user.type', 'collection')
            ->withTimestamps();
    }

    public function scopeIsPublic($query, bool $isPublic)
    {
        return $query->where('is_public', $isPublic);
    }
}
