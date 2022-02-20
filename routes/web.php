<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Page;
use App\Message;

Route::get('/',                 [ArticleController::class, 'index']);
Route::get('/articles/create',  [ArticleController::class, 'create']);
Route::get('/articles/{index}', [ArticleController::class, 'show']);
Route::post('/',                [ArticleController::class, 'store']);

Route::get('/contacts',         [ContactController::class, 'index']);
Route::post('/contacts',        [ContactController::class, 'store']);

Route::get('/aboutus', function () {
    $index    = Page::find(2);
    $pages    = Page::get();

    return view('aboutus', compact('pages', 'index'));
});

Route::get('/admin/feedback', function () {
    $index    = Page::find(5);
    $pages    = Page::get();
    $messages = Message::latest()->get();

    return view('admin', compact('pages', 'index', 'messages'));
});
