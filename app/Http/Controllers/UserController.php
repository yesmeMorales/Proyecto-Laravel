<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(){
        //Listado dinamico usando constructor de consultas laravel 
        //$users = DB::table('users')->get();
        //dd($users);

        //Cargar datos con eloquent
        $users = User::all();

        return view('users.index')
        	->with('users', $users)
        	->with('title', 'Listado de usuarios');
    }
    //call the user directly, this parameter must match that of the route in web.php
    public function show(User $user){
        return view('users.show', compact('user'));
    }
    

    public function create(){
        return view('users.create');
    }

    public function edit(User $user){
        return view('users.edit',['user'=> $user]);
    }

    public function store(){

        //return redirect('usuarios/nuevo')->withInput();
        //Usamos metodo request para obtener los datos y agregar el usuario
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ],[
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'password.required' => 'El campo password es obligatorio',
            'password.min' => 'El password debe tener mas de 6 caracteres'
        ]);
        //dd($data);


        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        //Al final podemos redireccionar a la lista de usuarios
        return redirect()->route('users.index');
    } 

    public function update(User $user){

        //dd('actualizado!');

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => ''
        ]);

        if($data['password'] != null ){
            $data['password'] = bcrypt($data['password']);
        } else {
            //Restauramos el password anterior
            unset($data['password']);
        }

        //$data['password'] = bcrypt($data['password']);

        $user->update($data);

        return redirect()->route('users.show', ['user' => $user]);
    }

    public function destroy(User $user){

        $user->delete();
        return redirect()->route('users.index');

    }



}
