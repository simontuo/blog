<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('articles')->get();

        $articles = Article::with([
                'user', 'tags'
            ])->latest()->get();

        return view('pages.index', [
            'tags'     => $tags,
            'articles' => $articles,
        ]);
    }
}
