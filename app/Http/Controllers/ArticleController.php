<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Services\TagsSynchronizer;
use Illuminate\Support\Collection;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->latest()->get();

        return view('articles', compact('articles'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->name              = request('name');
        $article->short_description = request('short_description');
        $article->description       = request('description');
        $article->url               = request('url');
        $article->status            = request('status') ? 1 : 0;
        $article->save();

        TagsSynchronizer::sync($this->getCollectTags(request('tags')), $article);

        return redirect('/articles/' . $article->url);
    }

    public function show($index)
    {
        $article = Article::get($index);

        if (!$article) {
            return abort(404);
        }

        return view('show', compact('article'));
    }

    public function edit($index)
    {
        $article = Article::get($index);

        if (!$article) {
            return abort(404);
        }

        return view('edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->name              = request('name');
        $article->short_description = request('short_description');
        $article->description       = request('description');
        $article->url               = request('url');
        $article->status            = request('status') ? 1 : 0;
        $article->save();

        TagsSynchronizer::sync($this->getCollectTags(request('tags')), $article);

        return redirect('/articles/' . $article->url);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/articles');
    }

    protected function getCollectTags($request = ''): Collection
    {
         $tags = collect(explode(',', $request))->keyBy(function ($item) {
            return $item;
        });

         return $tags;
    }
}
