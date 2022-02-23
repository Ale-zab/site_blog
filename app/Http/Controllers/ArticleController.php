<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Главная';
        $articles = Article::publish();

        return view('welcome', compact('articles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Создать статью';
        return view('create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        $this->validate(request(), [
            'name'              => 'required|min:5|max:100',
            'short_description' => 'required|max:255',
            'description'       => 'required',
            'url'               => 'required',
        ]);

      $article->name              = request('name');
      $article->short_description = request('short_description');
      $article->description       = request('description');
      $article->url               = request('url');
      $article->status            = request('status') ? 1 : 0;

      $article->save();

      return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $index)
    {
        $title    = $index->name;
        return view('show', compact('title', 'index'));
    }

    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
