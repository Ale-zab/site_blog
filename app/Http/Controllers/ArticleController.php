<?php

namespace App\Http\Controllers;

use App\Article;
use App\Page;
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
        $index    = Page::find(1);
        $pages    = Page::get();
        $about    = Page::find(2);
        $about->description = mb_strimwidth($about->description, 0, 255, '...');
        $articles = Article::publish();

        return view('welcome', compact('articles', 'pages', 'index', 'about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $index    = Page::find(4);
        $about    = Page::find(2);
        $about->description = mb_strimwidth($about->description, 0, 255, '...');
        $pages    = Page::get();

        return view('create', compact('pages', 'index', 'about'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name'              => 'required|min:5|max:100',
            'short_description' => 'required|max:255',
            'description'       => 'required',
            'url'               => 'required',
        ]);

      $article = new Article();
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
        $pages    = Page::get();
        $about    = Page::find(2);
        $about->description = mb_strimwidth($about->description, 0, 255, '...');

        return view('show', compact('pages', 'index', 'about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
