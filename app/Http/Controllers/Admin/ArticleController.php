<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::query()->orderBy('id', 'desc')->paginate(15);

        return view('admin.articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpg,jpeg,png',
            'body' => 'required',
        ]);

        $path = $request->file('file')->store('images', 'public');

        Article::create([
            'title' => $request->title,
            'pic' => $path,
            'body' => $request->body,
        ]);

        return redirect(route('admin.news'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'file' => 'image|mimes:jpg,jpeg,png',
            'body' => 'required',
        ]);

        $article = Article::findOrFail($id);

        if ($request->title) {
            $article->title = $request->title;
        }

        if ($request->body) {
            $article->body = $request->body;
        }

        if ($request->file('file')){
            $article->pic = $request->file('file')->store('images', 'public');
        }

        $article->update([
            'title' => $article->title,
            'pic' => $article->pic,
            'body' => $article->body,
        ]);

        return redirect(route('admin.news'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $article->delete();

        return redirect(route('admin.news'));
    }
}
