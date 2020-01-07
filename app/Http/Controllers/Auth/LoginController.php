<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;


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
    //Constructor para dejar pasar al login solo a usuarios no autenticados
    public function __construct(){
        $this->middleware('guest',['only' => 'showLoginForm']);
    }

    public function login(){
        //Validamos los campos del formulario
        $credentials = $this->validate(request(), [
            $this->username() => 'required|string',
            'password' => 'required|string'
        ]);

        //return $credentials;
        //iniciaremos sesion del usuario
        //Usamos facade Auth y metodo attempt
        if (Auth::attempt($credentials)){
            //En caso de que las credenciales sean correctas lo redireccionamos a la lista de usuarios
            return redirect()->route('users.index');
        }

        return back()
            ->withErrors([ $this->username() => trans('auth.failed')])
            ->withInput(request([ $this->username()]));
    }

    public function showLoginForm(){
        //Retornamos la vista  login dentro de la carpeta auth
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        
        return redirect('/');
    }

    public function username(){
        return 'name';
    }
   
}
