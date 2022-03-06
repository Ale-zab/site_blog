<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::resource('/',              'HomeController');
Route::resource('/articles',      'ArticleController');
Route::resource('/contacts',      'ContactController');
Route::resource('/aboutus',       'AboutController');

Route::get('/admin',            [AdminController::class, 'index']);
Route::get('/admin/feedback',   [AdminController::class, 'feedback']);
