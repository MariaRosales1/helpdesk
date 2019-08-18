<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        return view('chats');
    }

    public function fetchMessages(){
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request){
        console.log("uasdfasdfasdfjl jua jaua jua ");

        $message = auth()->user()-> messages()->create([
            'message' => $request -> message]);
        broadcast(new MessageSent($message -> load('user')))->toOthers();
        // auth()->user()-> messages()->create([
        //         'message' => $request -> message]);
        return ['status' => 'success'];
    }
} 
