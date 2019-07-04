@extends('plantilla')

@section('seccion')

    @if(session('mensaje'))
        <div class="alert alert-success"> {{session('mensaje')}}</div>
    @endif
    <div class="container">
        <table class="table">
            <thead>
                @if (count($consultants) != 0)
                    <tr>
                        <td scope="col">Identificación</td>
                        <td scope="col">Nombre</td>
                        <td scope="col">Email</td>
                        <td scope="col">Acciones</td>
                    </tr>
                @endif
        </thead>
        <tbody>
            @forelse ($consultants as $consultant)
                <tr>
                    <td>{{$consultant->identification}}</td>
                    <td>{{$consultant->name}}</td>
                    <td>{{$consultant->email}}</td>
                    <td>                       
                        <a href="{{route('consultants.edit',$consultant)}}" class="btn btn-warning btn-sm">Editar</a>                                
                        <form action="{{route('consultants.destroy',$consultant)}}" method="POST" class="d-inline">
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