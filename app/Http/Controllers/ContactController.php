<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required',
            'message' => 'required',
        ]);

        $message = new Message();
        $message->email = request('email');
        $message->message = request('message');

        $message->save();

        return redirect('/');
    }
}
