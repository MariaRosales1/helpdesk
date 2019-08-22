
@extends('plantilla')

@section('seccion')

    @if(session('mensaje'))
        <div class="alert alert-success"> {{session('mensaje')}}</div>
    @endif
    
    @if(session('mensajeError'))
        <div class="alert alert-danger"> {{session('mensajeError')}}</div>
    @endif
    
    <div class="container">
        <table class="table">
            <thead>
                @if (count($users) != 0)
                    <tr>
                        <td scope="col">Identificación</td>
                        <td scope="col">Nombre</td>
                        <td scope="col">Email</td>
                        <td scope="col">Acciones</td>
                    </tr>
                @endif
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$user->identification}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>                       
                        <a href="{{route('users.edit',$user)}}" class="btn btn-warning btn-sm">Editar</a>                                
                        <form action="{{route('users.destroy',$user)}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>                                
                        </form>
                        
                    </td>    
                </tr>
                @empty
                    <div class="alert alert-warning"><h1>No se encontraron asesores</h1></div>
                @endforelse
        </tbody>
        </table>
    </div>    
@endsection