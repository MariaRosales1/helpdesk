<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\User;


class ContactsController extends Controller
{
    public function get(){
        //Condición para los contactos 
        $contacts = User::all();

        return response()->json($contacts);
    }

    public function getMessageFor($id){
        $messages = Message::where('from', $id)->orWhere('to',$id)->get();

        return response()->json($messages);
    }
}

