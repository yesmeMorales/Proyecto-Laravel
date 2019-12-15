@extends('layout')

@section('title', "Crear Usuario")

@section('content')
    <h1 class="titulo-header">Editar usuario</h1>


    @if($errors->any())
        <div class="alert alert-danger">
            <h6>Por favor corrige los siguientes errores debajo:</h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        
       
    @endif

    <form method="POST" action="{{ url("usuarios/{$user->id}") }}">
        {{ method_field('PUT') }}
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" placeholder="Maria Jiménez" value="{{ old('name', $user->name) }}">

        </div>

        <div class="form-group">
            <label for="email">Correo Electronico:</label>
            <input type="email" class="form-control" name="email" placeholder="ejemplo@gamil.com" value="{{ old('email', $user->email) }}">
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" name="password" placeholder="Mayor a 6 caracteres">
        </div>
        
        <div class="d-flex  ">

            <button type="submit" class="btn btn-danger" id="update-user">Actualizar Usuario</button>


            <p>
                <a href="{{ route('users.index') }}" class="btn btn-primary" >Regresar al Listado</a>
            </p>
        </div>
       
    </form>
    

 
@endsection