<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Consultant as ConsultantModel;
use App\Http\Requests\Consultant;
use App\User as UserModel;


class ConsultantController extends Controller
{
    public function index()
    {
        $consultants = UserModel::all();

        return view('consultants.manage', [
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
        $newConsultant->password = Hash::make($request->input('password'));
        $newConsultant->fill($data);
        $newConsultant->save();
        return back()->with('mensaje', 'El asesor fue registrado exitosamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try {
            $consultant = UserModel::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect('consultants')->with('mensajeError', 'No se pudo encontrar el asesor a editar');
        }
        return view('consultants.edit', [
            'consultant' => $consultant,
        ]);
    }

    public function update(Consultant $request, $id)
    {
        try {
            $userUpdate = UserModel::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return back()->with('mensajeError', 'No se pudo encontrar el asesor a editar');
        }

        Validator::make($request->all(), [
            'identification' => 'required|min:0|integer|digits_between:5,15|unique:users' . ($id ? ",identification,$id" : ''),
            'name' => 'required|between:3,30',
            'email' => 'required|email|unique:users' . ($id ? ",email,$id" : ''),
            'password' => 'required|min:6'
        ], [
            'identification.required' => 'La identificación es obligatoria',
            'identification.min' => 'La identificación no puede ser negativa',
            'identification.integer' => 'La identificación debe ser un número entero',
            'identification.digits_between' => 'La identificación debe contener entre 5 y 15 digítos',
            'identification.unique' => 'La identificación ya está en uso',
            'name.required' => 'El nombre es obligatorio',
            'name.between' => 'El nombre debe contener entre 3 y 30 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico es incorrecto',
            'email.unique' => 'El correo electrónico ya está en uso',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',
        ])->validate();

        $userUpdate->update([
            'identification' => $request['identification'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('consultants')->with('mensaje', 'El usuario fue actualizado exitosamente');
    }

    public function destroy($id)
    {
        try {
            $userDelete = UserModel::findOrFail($id);          
        } catch (ModelNotFoundException $e) {
            return redirect('consultants')->with('mensajeError', 'No se pudo encontrar el asesor a eliminar');
        }

        $consultantDelete = ConsultantModel::where('user_id', $id);
        if ($consultantDelete == null) {
            return redirect('consultants')->with('mensajeError', 'No se pudo encontrar el asesor a eliminar');
        }

        $consultantDelete->delete();
        $userDelete->delete();

        return redirect('consultants')->with('mensaje', 'Asesor Eliminado exitosamente');
    }
}
