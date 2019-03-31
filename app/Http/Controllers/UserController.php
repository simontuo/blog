<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request, User $user)
    {
        $user->load('articles', 'comments.commentable', 'likes', 'collections');

        $tags      = Tag::withCount('articles')->get();
        $resources = Resource::get();

        return view('users.show', [
            'user'      => $user,
            'tags'      => $tags,
            'resources' => $resources
        ]);
    }
}
