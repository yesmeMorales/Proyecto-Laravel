<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
    public function welcome($name){
        $name = ucfirst($name);
        return "Bienvenido {$name}";
    }

    public function welcomeNickname($name, $nickname){
        $name = ucfirst($name);
        return "Bienvenido {$name}, tu apodo es {$nickname}";
    }
}
