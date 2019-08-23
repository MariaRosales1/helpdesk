<?php

namespace App\Http\Controllers;
use App\Models\Customer as CustomerModel;
use Illuminate\Http\Request;
use App\Http\Requests\Customer;
use App\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index(){
        $enableButton=0;
        return view('customers.edit', [ 'enableButton' =>$enableButton] );
    }
    public function store(Customer $request){
        
        $enableButton=1;
        $data = $request->validated();
        $newCustomer= new CustomerModel();
        $newCustomer->fill($data);
        $newCustomer->save();
        
        //Creación del customer como usuario 
        $usuario= User::create([
            'identification' => rand(1000000000, 9999999999),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make('123456789'),
            'rol' => 'customer'
        ]);
        
        return view('customers.edit', [ 'enableButton' =>$enableButton,'usuario' => $usuario] );
        // return back()->with('mensaje','El asesor fue registrado exitosamente');
    }
    public function chat(){

        return view('chatCustomer.chat');
    }
}
