<?php

namespace App\Http\Controllers;
use App\Models\Customer as CustomerModel;
use Illuminate\Http\Request;
use App\Http\Requests\Customer;

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
        
        
        return view('customers.edit', [ 'enableButton' =>$enableButton] );
        // return back()->with('mensaje','El asesor fue registrado exitosamente');
    }
    public function chat(){

        return view('chatCustomer.chat');
    }
}
