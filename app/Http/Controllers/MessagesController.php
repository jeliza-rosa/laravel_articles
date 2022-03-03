<?php

namespace App\Http\Controllers;

use App\Models\Message;

class MessagesController extends Controller
{

    public function messagePost()
    {
        $this->validate(request(), [
            'email' => 'required',
            'message' => 'required',
        ]);

        Message::create(request()->all());

        return redirect('/contacts');
    }

    public function message()
    {
        return view('message');
    }

    public function messageGetAll()
    {
        $messages = Message::latest()->get();

        return view('admin', compact('messages'));
    }
}
