<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;

Route::get('/',                 [ArticleController::class, 'index']);
Route::get('/articles/create',  [ArticleController::class, 'create']);
Route::get('/articles/{index}', [ArticleController::class, 'show']);
Route::post('/',                [ArticleController::class, 'store']);

Route::get('/contacts',         [ContactController::class, 'index']);
Route::post('/contacts',        [ContactController::class, 'store']);

Route::get('/admin/feedback',   [AdminController::class, 'feedback']);
Route::get('/aboutus',          [AboutController::class, 'index']);
