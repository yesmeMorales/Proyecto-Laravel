@extends('layout')

@section('content')
    
    <h1 class="titulo-header">{{ $title }}</h1>
                    
    <ul>
            
        @forelse ($users as $user)
            <li>
                {{ $user->name }}, {{ $user->email }}
                <a href="{{ route('users.show', ['user' => $user]) }}">Ver detalles</a>
            </li>
            
        @empty
            <li>No hay usuarios registrados. :( </li>
        @endforelse

    </ul>
    
@endsection

{{-- @section('sidebar')
    
    @parent
    <h2>Barra lateral personalizada</h2>
    
@endsection --}}