<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSentEvent;
use App\Models\Message;
use App\Models\User;
// use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user_1 = $users->find(1);
        $user_2 = $users->find(2);
        // dd($user);

        return view('chat/chat', compact('user_1', 'user_2'));
    }
    
    public function get()
    {
        return Message::with('user')->get();
    }

    public function send(Request $request)
    {
        $user = Auth::user();
 
        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);
 
        event(new MessageSentEvent($user, $message));

        return ['status' => $message];
    }
}
