<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultant as ConsultantModel;
use App\Http\Requests\Consultant;

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
        $newConsultant->fill($data);
        $newConsultant->save();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
