<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }

    function chat()
    {
        return view('chat');
    }

    function message()
    {
        return Message::with('user')->get();
    }
    function messageStore(Request $request)
    {
        $user = auth()->user();
        $message = $user->messages()->create([
            'message' => $request->message
        ]);

        broadcast(new SendMessage($user,$message))->toOthers();
        return 'Message send';
    }
}
