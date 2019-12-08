<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        if (request()->has('empty')){
            $users = [];
        } else {
            $users = [
                'Joel',
                'Ellie',
                'Tess',
                'Tommy',
                'Bill',
                '<script>alert("Clicker")</script>'
            ];

        }
        
        return view('users.index')
        	->with('users', $users)
        	->with('title', 'Listado de usuarios');
    }

    public function show($id){
        return view('users.show', compact('id'));
    }

    public function create(){
        return view('crear');
    }

    public function edit($id){
        return "Editando usuario: {$id}";
    }



}
