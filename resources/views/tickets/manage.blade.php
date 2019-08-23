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
                @if (count($tickets) != 0)
             
                    <tr>
                        <td scope="col">Código</td>
                        <td scope="col">Estado</td>
                        <td scope="col">Fecha apertura</td>
                        <td scope="col">Fecha de cierre </td>
                        <td scope="col">Acciones</td>
                    </tr>
                @endif
        </thead>
        <tbody>
            @forelse ($tickets as $ticket)
                <tr>
                    <td>{{$ticket->code}}</td>
                    <td>{{$ticket->state}}</td>
                    <td>{{$ticket->opening_date}}</td>
                    <td>{{$ticket->closing_date}}</td>
                    <td>                       
                        <a href="{{ route('tickets.edit', $ticket)}}" class="btn btn-warning btn-sm">Cerrar ticket</a>                                
                    </td>    
                </tr>
            @empty
                    <div class="alert alert-warning"><h1>No se encontraron tickets </h1></div>
            @endforelse
        </tbody>
        </table>
    </div>    
@endsection