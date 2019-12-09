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
//We tell laravel point to the controller or class and @metodo
Route::get('/usuarios', 'UserController@index')
    ->name('users.index');

//Usamos un parametro dinamico para mostrar algo de acuerdo al id del usuario
//We use a dynamic parameter to show something according to the user's id
Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/usuarios/nuevo', 'UserController@create')
    ->name('users.create');

Route::get('/usuarios/editar/{id}', 'UserController@edit')
    ->name('users.edit');

Route::get('/saludo/{name}', 'WelcomeUserController@welcome');

Route::get('/saludo/{name}/{nickname}', 'WelcomeUserController@welcomeNickname');
