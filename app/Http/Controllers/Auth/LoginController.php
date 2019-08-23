<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User as UserModel;
use Illuminate\Support\Facades\Auth;

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
        define('ADMIN', 'admin');
        if($user->rol == ADMIN ){
            return redirect('/consultants');
        }else {
            return redirect('/home');
        }
    }
    
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }


    public function logout(Request $request)
    {
        $user = Auth::user()->id;    
        define('CUSTOMER', 'customer');
        if( Auth::user()->rol  == CUSTOMER ){
            $userDelete = UserModel::findOrFail(Auth::id());
            $userDelete->delete();   
            
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?:  redirect('calificar');

        // return $this->loggedOut($request) ?:  view('prueba',[
        //     'user' => $user,
        // ]); 
        }

        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }



}


