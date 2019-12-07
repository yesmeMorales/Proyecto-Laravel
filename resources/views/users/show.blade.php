@extends('layout')

@section('title', "Usuario { $id }")

@section('content')
    <h1 class="titulo-header">Usuario #{{ $id }}</h1>
    Mostrando detalle del usuario: {{ $id }}
@endsection