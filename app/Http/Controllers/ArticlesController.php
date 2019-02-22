<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Http\Requests\StoreCommentRequest;
use App\Libraries\ParsedownExtra;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show(Request $request, Article $article)
    {
        $parsedownExtra = new ParsedownExtra();

        $article->content = $parsedownExtra->text($article->content);
        $article->load(['tags', 'likes', 'comments.user']);
        $article->increment('read_count');

        $tags = Tag::withCount('articles')->get();

        return view('articles.show', [
            'article' => $article,
            'tags'    => $tags,
        ]);
    }

    public function like(Request $request, Article $article)
    {
        if (user()->likes->where('id', $article->id)->count() > 0) {
            throw new InvalidRequestException('你已经点赞了');
        }

        user()->likes()->attach($article->id);

        return response()->json(['message' => '点赞成功']);
    }

    public function comment(StoreCommentRequest $request, Article $article)
    {
        $comment = new Comment([
           'content' => $request->{'content'},
        ]);

        $comment->user()->associate(user());

        $article->comments()->save($comment);

        return response()->json(['message' => '评论成功']);
    }
}
