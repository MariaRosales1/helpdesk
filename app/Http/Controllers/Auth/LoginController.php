<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User as UserModel;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //Cambiar para realizar la redirección
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        
        if($user->rol == 'admin' ){
            return redirect('/users');
        }else {
            return redirect('/home');
        }

        // if( $userUpdate->where('rol',"asesor")){
        //     return redirect('/users');
        // }
        // if($user->where('rol','admin')){
        //     return redirect('/consultants');
        // }if($user->where('rol','asesor')){
        //     return redirect('/users');
        // }
    }
}


