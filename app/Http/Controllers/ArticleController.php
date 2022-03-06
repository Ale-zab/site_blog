<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleForm;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::publish();

        return view('articles', compact('articles'));
    }

    public function create()
    {
        return view('create', compact('article'));
    }

    /**
 * Store the incoming blog post.
 *
 * @param  ArticleForm  $request
 * @return Response
 */

    public function store(ArticleForm $request, Article $article)
    {
        $validated = $request->validated();

        $article->name              = request('name');
        $article->short_description = request('short_description');
        $article->description       = request('description');
        $article->url               = request('url');
        $article->status            = request('status') ? 1 : 0;

        $article->save();

        return redirect('/articles/' . $article->url);
    }

    public function show(Article $article)
    {
        return view('show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('edit', compact('article'));
    }

    public function update(ArticleForm $request, Article $article)
    {

        $validated = $request->validated();

        $article->name              = request('name');
        $article->short_description = request('short_description');
        $article->description       = request('description');
        $article->url               = request('url');
        $article->status            = request('status') ? 1 : 0;

        $article->save();

        return redirect('/articles/' . $article->url);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/articles');
    }
}
