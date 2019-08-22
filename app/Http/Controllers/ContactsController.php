<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use App\User;


class ContactsController extends Controller
{
    public function get(){
        //Condición para los contactos 
        $contacts = User::where('id','!=', auth()->id())->get();

        return response()->json($contacts);
    }

    public function getMessageFor($id){
        $messages = Message::where('from', $id)->orWhere('to',$id)->get();

        return response()->json($messages);
    }

    public function send(Request $request){    
        $message = Message::create([
            'from' => Auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text,
        ]);

        broadcast(new NewMessage($message));

        return response()->json($message);
    }
}

