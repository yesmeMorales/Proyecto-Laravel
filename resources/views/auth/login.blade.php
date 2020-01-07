@extends('layouts.app')


@section('content')

    <div class="row content_email">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">
                        Acceso  la aplicacion
                    </h1>
                </div>
                <div class="panel-body ">
                    <form action="{{ route('login') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group  {{ $errors->has('name') ? 'alert alert-danger' : '' }}">
                            <label for="name">Username</label>
                            <input class="form-control" type="text" name="name" placeholder="Ingresa tu username" value={{ old('email') }}>
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group  {{ $errors->has('password') ? 'alert alert-danger' : '' }}">
                            <label for="password">Contraseña</label>
                            <input class="form-control" type="password" name="password" placeholder="Ingresa tu password">
                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                        </div>
                        <button class="btn btn-primary btn-block">Acceder</button>
                    </form>
                </div>
                
            </div>
        </div>

    </div>
@endsection
