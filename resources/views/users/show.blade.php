@extends('layout')

@section('title', "Usuario { $user->id }")

@section('content')
    <div class="card">

        <div class="card-header">
            <h3 class="card-title"> Mostrando detalle del usuario: {{ $user->id}}</h3>
        </div>

        <div class="card-body">
            <p class="card-text"> <strong>Nombre del usuario:</strong> {{ $user->name }} </p>
            <p class="card-text"> <strong>Correo Electronico:</strong> {{$user->email}} </p>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Regresar al Listado</a>
        </div>
    </div>
   
@endsection