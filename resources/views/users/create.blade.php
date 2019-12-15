@extends('layout')

@section('title', "Crear Usuario")

@section('content')

    <div class="card">
            <h1 class="card-header" >Crear usuario</h1>

        <div class="card-body">
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

            <form method="POST" action="{{ url('usuarios/crear') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control"  name="name" placeholder="Maria Jiménez" value="{{ old('name') }}">
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="ejemplo@gamil.com" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Mayor a 6 caracteres">
                </div>
                
                <button type="submit" class="btn btn btn-danger">Crear Usuario</button>

                <a href="{{ route('users.index') }}"  class="btn btn-primary">Regresar al Listado</a>
            </form>   
        </div>
    </div>
    
@endsection