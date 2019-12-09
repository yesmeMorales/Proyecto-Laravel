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
        return view('crear');
    }

    public function edit($id){
        return "Editando usuario: {$id}";
    }



}
