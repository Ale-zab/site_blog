<?php

namespace App\Http\Controllers;

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
        $title = 'Контакты';
        return view('contacts', compact('title'));
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
