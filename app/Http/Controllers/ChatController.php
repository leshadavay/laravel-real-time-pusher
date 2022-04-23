<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Events\StartChatWith;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showChat()
    {
        return view('chat.show');
    }


    public function createMessage(Request $request)
    {

        $request->validate([
            'message'   =>  'required'
        ]);

        broadcast(new MessageSent($request->user(),$request->message));

        return response()->json('Message sent');

    }

    //chat with specifig user
    public function chatWithUser(Request $request,User $user)
    {
        broadcast(new StartChatWith($user,"{$request->user()->name} greeted you"));
        broadcast(new StartChatWith($request->user(),"You greeted {$user->name}"));

        return "Starting chat with user {$request->user()->name} -> {$user->name}";

    }

}
