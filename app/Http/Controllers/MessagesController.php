<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use App\User;
use App\Models\Consultant;
use App\Http\Controllers\DB;

class MessagesController extends Controller
{
    public function get(){
        //Condición para los contactos 
        $contacts = User::where('id','!=', auth()->id())->get();

        // $contacts = User::where(function($query){
        //     $query->where('id','!=', auth()->id())
        //         ->andWhere('rol', '!=', 'customer');
        // })->get();
            
            

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

    public function assigned(){
        // $consultant = User::where('id','!=', auth()->id())->get();
        
        $consultant= User::find(2);
        
        //$consultant = User::where('id', '==', $consultant2)->get();
        // $consultant = DB::table('users')->where('id', '1')->get();
        
        return response()->json($consultant);
    }
}
