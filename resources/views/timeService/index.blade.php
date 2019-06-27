@extends('plantilla')
@section('seccion')

<div class="container">
     <br>
    <br>

    <table class="table">
    <thead class="thead-light">
        @if (count($timeServices) != 0)
            <tr>
            <th scope="col">Día de Incio</th>
            <th scope="col">Día de Fin </th>
            <th scope="col">Hora de Inicio</th>
            <th scope="col">Hora de Fin</th>
            </tr>
        @endif
    </thead>
    <tbody>
        @forelse ($timeServices as $timeService)
                <tr>
                    <td>{{$timeService->diaInicio}}</td>
                    <td>{{$timeService->diaFin}}</td>
                    <td>{{$timeService->horaInicio}}</td>
                    <td>{{$timeService->horaFin}}</td>
                </tr>
            @empty
                <h1>No se encontraron horarios</h1>
        @endforelse

    </tbody>
    </table>
    </div>
@endsection