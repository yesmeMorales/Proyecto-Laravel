@extends('layout')

@section('content')

    <div class="d-flex justify-content-between align-items-end mb-3">
    
        <h1 class="titulo-header">{{ $title }}</h1>

        <p>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Nuevo usuario</a>
        </p>
    </div>

    @if ($users->isNotEmpty())
        
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="accions">

                           
                            <a id="user-show" class="btn btn-link" href="{{ route('users.show', $user) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M256 105c-101.8 0-188.4 62.4-224 151 35.6 88.6 122.2 151 224 151s188.4-62.4 224-151c-35.6-88.6-122.2-151-224-151zm0 251.7c-56 0-101.8-45.3-101.8-100.7S200 155.3 256 155.3 357.8 200.6 357.8 256 312 356.7 256 356.7zm0-161.1c-33.6 0-61.1 27.2-61.1 60.4s27.5 60.4 61.1 60.4 61.1-27.2 61.1-60.4-27.5-60.4-61.1-60.4z"/>
                                </svg>
                                
                            </a>

                            <a id="user-edit" class="btn btn-link" href="{{ route('users.edit', $user) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z"/>
                                </svg>
                            </a> 
                           
                            <form action="{{ route('users.destroy', $user) }}" method="POST" >
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                
                                <button type="submit" class="btn btn-link" id="user-delete">  
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M128 405.429C128 428.846 147.198 448 170.667 448h170.667C364.802 448 384 428.846 384 405.429V160H128v245.429zM416 96h-80l-26.785-32H202.786L176 96H96v32h320V96z"/>
                                    </svg>
                                </button>
                            </form>

                            

                        </td>
                       
                    </tr>
                @endforeach
            </tbody>
        
        </table>
    
    @else 
        <p>No hay usuarios registrdos.</p>
    @endif
                    
@endsection

{{-- @section('sidebar')
    
    @parent
    <h2>Barra lateral personalizada</h2>
    
@endsection --}}