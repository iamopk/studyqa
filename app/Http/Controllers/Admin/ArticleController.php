<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::query()->orderBy('id', 'desc')->paginate(15);

        return view('admin.articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpg,jpeg,png',
            'body' => 'required',
        ]);

        $path = $request->file('file')->store('images', 'public');

        Article::query()->create([
            'title' => $request->title,
            'pic' => $path,
            'body' => $request->body,
        ]);

        return redirect(route('admin.news'));
    }

    public function edit($id)
    {
        $article = Article::query()->findOrFail($id);

        $this->authorize('edit', $article);

        return view('admin.articles.edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'file' => 'image|mimes:jpg,jpeg,png',
            'body' => 'required',
        ]);

        /**
         * @var $article Article
         */
        $article = Article::query()->findOrFail($id);

        $this->authorize('update', $article);

        if ($request->title) {
            $article->title = $request->title;
        }

        if ($request->body) {
            $article->body = $request->body;
        }

        if ($request->file('file')) {
            $article->pic = $request->file('file')->store('images', 'public');
        }

        $article->update([
            'title' => $article->title,
            'pic' => $article->pic,
            'body' => $article->body,
        ]);

        return redirect(route('admin.news'));
    }

    public function destroy($id)
    {
        $this->authorize('destroy');

        $article = Article::query()->findOrFail($id);

        $article->delete();

        return redirect(route('admin.news'));
    }
}
