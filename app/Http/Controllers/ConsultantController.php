<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultant as ConsultantModel;
use App\Http\Requests\Consultant;
use Illuminate\Support\Facades\Hash;

class ConsultantController extends Controller
{
    public function index()
    {
        $consultants = ConsultantModel::all();

        return view('consultants.index', [
            'consultants' => $consultants,
        ]);
    }

    public function create()
    {
        return view('consultants.create');
    }

    public function store(Consultant $request)
    {
        $data = $request->validated();
        $newConsultant = new ConsultantModel;
        $newConsultant-> password = Hash::make($request->input('password'));
        $newConsultant->fill($data);
        $newConsultant->save();
        return back()->with('mensaje','El asesor fue registrado exitosamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $consultant= ConsultantModel::findOrFail($id);
        return view('consultants.edit', [
            'consultant' => $consultant,
        ]);
    }

    public function update(Consultant $request, $id)
    {
        $data = $request->validated();
        $consultantUpdate = ConsultantModel::findOrFail($id);
        $consultantUpdate->fill($data);
        $consultantUpdate->save();
        return redirect('consultants')->with('mensaje','El asesor fue actualizado exitosamente');
    }

    public function destroy($id)
    {
        $consultantDelete = ConsultantModel::findOrFail($id);
        $consultantDelete->delete();
        return redirect('consultants')->with('mensaje','Asesor Eliminado exitosamente');        
    }
}
