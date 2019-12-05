<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
    return 'Home';
});
//Le indicamos a laravel que apunte al controlador o clase y @metodo
Route::get('/usuarios', 'UserController@index');

//Usamos un parametro dinamico para mostrar algo de acuerdo al id del usuario
Route::get('/usuarios/{id}', 'UserController@show')
    ->where('id', '[0-9]+');

Route::get('/usuarios/nuevo', 'UserController@create');

Route::get('/usuarios/editar/{id}', 'UserController@edit');

//vamos a colocar una funcion anonima con dos parametros
//para que un parametro sea opcional podemos usar ? y hacer la variable = null
// y usamos un if para saber que mensaje imprimir
Route::get('/saludo/{name}', 'WelcomeUserController@welcome');

Route::get('/saludo/{name}/{nickname}', 'WelcomeUserController@welcomeNickname');
