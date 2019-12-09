@extends('layout')

@section('title', "Usuario { $user->id }")

@section('content')
    <h1 class="titulo-header">Usuario #{{ $user->id }}</h1>
    Mostrando detalle del usuario: {{ $user->id}}
    <p>Nombre del usuario: {{ $user->name }}</p>
    <p>Correo Electronico: {{$user->email}}</p>

    <p>
        <a href="{{ route('users.index') }}">Regresar al Listado</a>
    </p>
@endsection