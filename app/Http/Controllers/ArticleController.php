<?php

namespace App\Http\Controllers;

use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::query()->orderBy('id', 'desc')->paginate(5);

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        $article = Article::query()->find($article->id);

        return view('articles.show', ['article' => $article]);
    }
}
