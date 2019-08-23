<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateServiceRequest;
use App\Ticket;
use Illuminate\Http\Request;

class RateServiceController extends Controller
{
    public function index($id)
    {
        return view('service.grade', compact('id'));
    }

    public function rate(RateServiceRequest $request, $id)
    {
        $ticket = Ticket::find($id);

        if (! $ticket) {
            return back()->withInput()->withErrors([
                'message' => 'No se puede calificar un ticket que no existe',
            ]);
        }

        $ticket->update($request->validated());

        return back()->withInput()->with([
            'message' => 'Gracias por tu participación',
        ]);
    }
}
