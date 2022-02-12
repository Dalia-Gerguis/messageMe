<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    // public function __construct() {
    //     $this->middleware('message');
    //     // dd($request);
    // }
    public function create($id)
    {
        $user = User::where('id', $id)->first();

        return view('messages.messageForm', compact('user'));
    }

    public function store($id, Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $message = Message::create([
            'body' => $request->body,
            'reciever_id' => $id,
            'sender_id' => auth()->id()
        ]);

        return redirect()->route('user.sent', ['id' => auth()->id()])->with('status', 'message is sent to ' . (User::find($id))->name);

        // dd($id, $request);
    }

    public function sent($id)
    {
        if ($id != auth()->id()) {
            return redirect('home')->with('error', 'You are not authorized to view this page');
        }

        $messages = Message::where('sender_id', auth()->id())->withCount('replies')->paginate(5);

        $data = [
            'messages' => $messages,
            'title' => 'Your Sent Messages:'
        ];
        return view('messages.index', $data);
    }
    public function inbox($id)
    {
        if ($id != auth()->id()) {
            return redirect('home')->with('error', 'You are not authorized to view this page');
        }

        $messages = Message::where('reciever_id', auth()->id())->withCount('replies')->paginate(5);
        $data = [
            'messages' => $messages,
            'title' => 'Your Inbox:'
        ];
        return view('messages.index', $data);
    }
    public function show($id)
    {
        $message = Message::where('id', $id)->with('replies')->first();

        return view('messages.show', compact('message'));

    }
}
