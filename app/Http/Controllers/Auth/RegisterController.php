<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User as UserModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
//use Illuminate\Support\Facades\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'identification' => 'required|min:0|integer|digits_between:5,15|unique:users,identification',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'identification' => $data['identification'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function index()
    {
        $users = UserModel::all();

        return view('users.gestionar', [
            'users' => $users,
        ]);
    }

    public function edit($id)
    {   
        try {
            $user= UserModel::findOrFail($id);
        }
        catch (ModelNotFoundException $e){
            return redirect('users')->with('mensajeError','No se pudo encontrar el usuario a editar');  
        }

        return view('users.edit', [
            'users' => $user,
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'identification' => 'required|min:0|integer|digits_between:5,15|unique:users'.($id ? ",identification,$id": ''),
            'name' => 'required',
            'email' => 'required|email|unique:users'.($id ? ",email,$id": ''),
            'password' => 'min:6',
        ));
       
        //$data=$this->validator($request->all())->validate();
        try {
            $userUpdate= UserModel::findOrFail($id);
        }
        catch (ModelNotFoundException $e){
            return redirect('users')->with('mensajeError','No se pudo encontrar el usuario a editar');  
        }
        
        $userUpdate->update([
            'identification' => $request['identification'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('users')->with('mensaje','El usuario fue actualizado exitosamente');
    }


    public function destroy($id)
    {
        try {
        $userDelete = UserModel::findOrFail($id);
        }
        catch (ModelNotFoundException $e){
            return redirect('users')->with('mensajeError','No se pudo encontrar el usuario a eliminar');  
        }
        $userDelete->delete();
        return redirect('users')->with('mensaje','usuario Eliminado exitosamente');        
    }

    
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
}
