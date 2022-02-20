<?php

namespace App\Http\Controllers;

use App\Page;
use App\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index    = Page::find(3);
        $about    = Page::find(2);
        $about->description = mb_strimwidth($about->description, 0, 255, '...');
        $pages    = Page::get();
        return view('contacts', compact('pages', 'index', 'about'));
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
          'email'   => 'required',
          'message' => 'required',
      ]);

      $message = new Message();
      $message->email   = request('email');
      $message->message = request('message');

      $message->save();

      return redirect('/');
    }
}
