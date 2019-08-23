<?php

namespace App\Http\Controllers;
use App\Models\Consultant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Ticket as TicketModel;
use App\Http\Requests\Ticket;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //Saber la id del asesor
        try {
            $id = Auth::id();
            $user2 = Consultant::where('user_id', $id)->first();
            
            $a = $user2->id;
            $tickets = TicketModel::where('id', $a)->get();
        }
        catch (ModelNotFoundException $e){
            return redirect('tickets.manage')->with('mensajeError','Nooooooooooo se pudo encontrar el ticket editar');  
        }
        // $tickets = $a;
        
        return view('tickets.manage', ['tickets' => $tickets]);
    }

    public function edit($id){
        try {
            $ticket= TicketModel::findOrFail($id);
        }
        catch (ModelNotFoundException $e){
            return redirect('tickets.manage')->with('mensajeError','No se pudo encontrar el ticket editar');  
        } 
        return view('tickets.edit', ['ticket' => $ticket]);
    }

    public function update(Ticket $request, $id){
        $data = $request->validated();
        
        try {
            $ticketUpdate= TicketModel::findOrFail($id);
        }
        catch (ModelNotFoundException $e){
            return redirect('tickets.manage')->with('mensajeError','No se pudo encontrar el ticket editar');  
        }
      
       

        //Decrease the number_ticket in 1 of a consultant
        $id = Auth::id();
        $user2 = Consultant::where('user_id', $id)->first();
        
        $a = $user2->number_ticket;
        if ($a > 0){
            $decrease=$a-1;
            $user2->update([
                'number_ticket' => $decrease,
            ]);
        }
        
         // Update ticket
        $now = new \DateTime();
        $ticketUpdate->update([
            'note' => $request['note'],
            'state' => 'cerrado',
            'closing_date' => $now->format('Y-m-d H:i:s') ]);
    

        return redirect('tickets')->with('mensaje','El ticket se cerro exitosamente'); 
    }

}
