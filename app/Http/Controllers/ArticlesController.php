<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Http\Requests\StoreCommentRequest;
use App\Libraries\ParsedownExtra;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Resource;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * 文章展示
     *
     * author SimonTuo
     * @param Request $request
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Article $article)
    {
        $parsedownExtra = new ParsedownExtra();

        $article->content = $parsedownExtra->text($article->content);
        $article->load(['tags', 'likes', 'comments.user']);
        $article->increment('read_count');

        $tags      = Tag::withCount('articles')->get();
        $resources = Resource::get();

        return view('articles.show', [
            'article'   => $article,
            'tags'      => $tags,
            'resources' => $resources,
        ]);
    }

    /**
     * 文章点赞
     *
     * author SimonTuo
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     * @throws InvalidRequestException
     */
    public function like(Article $article)
    {
        if (user()->likes->where('id', $article->id)->count() > 0) {
            throw new InvalidRequestException('你已经点赞了');
        }

        user()->likes()->attach($article->id, ['type' => 'like']);

        return response()->json(['message' => '点赞成功']);
    }

    /**
     * 文章评论
     *
     * author SimonTuo
     * @param StoreCommentRequest $request
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function comment(StoreCommentRequest $request, Article $article)
    {
        $comment = new Comment([
            'content' => $request->{'content'},
        ]);

        $comment->user()->associate(user());

        $article->comments()->save($comment);

        return response()->json(['message' => '评论成功']);
    }

    /**
     * 收藏
     *
     * author SimonTuo
     * @param Article $article
     * @return mixed
     * @throws InvalidRequestException
     */
    public function collect(Article $article)
    {
        if (user()->collections->where('id', $article->id)->count() > 0) {
            throw new InvalidRequestException('你已经收藏了');
        }

        user()->collections()->attach($article->id, ['type' => 'collection']);

        return response()->json(['message' => '收藏成功']);
    }
}
