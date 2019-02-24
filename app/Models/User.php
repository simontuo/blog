<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'avatar', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Article::class, 'article_user')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
