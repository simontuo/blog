<?php

namespace App\Models;

use App\Libraries\ParsedownExtra;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'commentable_id',
        'commentable_type',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function getContentAttribute($value) : string
    {
        $parsedownExtra = new ParsedownExtra();

        return $parsedownExtra->text($value);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'comment_user')
            ->withTimestamps();
    }
}
