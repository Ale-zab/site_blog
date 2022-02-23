<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {}

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function feedback()
    {
        $title = 'Админ. раздел';
        $messages = Message::latest()->get();

        return view('admin', compact('title', 'messages'));
    }
}
