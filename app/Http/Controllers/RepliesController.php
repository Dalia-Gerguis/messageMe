<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    // public function index($id)
    // {
    //     $replies = Message::find($id)->replies()->paginate(5);

    //     return view('replies.index', compact('replies'));
    // }

    public function create($id)
    {
        $message = Message::find($id);

        return view('replies.replyForm', compact('message'));
    }

    public function store($id, Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        // $message = Message::create([
        //     'body' => $request->body,
        //     'reciever_id' => $id,
        //     'sender_id' => auth()->id()
        // ]);

        Reply::create([
            'body' => $request->body,
            'user_id' => auth()->id(),
            'message_id' => $id
        ]);

        return redirect()->route('message.show', ['id' => $id])->with('status', 'your reply is sent.');

        // dd($id, $request);
    }
}
