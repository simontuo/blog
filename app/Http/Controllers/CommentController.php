<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function like(Comment $comment)
    {
        if (user()->commentLikes()->where('comment_id', $comment->id)->count() > 0) {
            throw new InvalidRequestException('你已经点赞了');
        }

        user()->commentLikes()->attach($comment->id);

        return response()->json(['message' => '点赞成功']);
    }
}
