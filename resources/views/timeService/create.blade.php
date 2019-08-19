@extends('plantilla')
@section('seccion')

    @if(session('mensaje'))
        <div class="alert alert-success"> {{session('mensaje')}}</div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger container">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="container">
        <form method="POST" action="{{route('timeservice.store')}}">
            @csrf

            <br>
            <div class="row">
                <div class="col">
                    <select class="custom-select" name="start_day">
                        @foreach(['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'] as $day)
                            <option value="{{$day}}"
                                    @if (($timeService) && $day == $timeService->start_day) selected="selected" @endif>
                                {{ucfirst(strtolower($day))}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select class="custom-select" name="final_day">
                        @foreach(['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'] as $day)
                            <option value="{{$day}}"
                                    @if (($timeService) && $day == $timeService->final_day) selected="selected" @endif>
                                {{ucfirst(strtolower($day))}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <input type="time" class="form-control" placeholder="Hora Inicio" name="start_time"
                           value="{{$timeService ? date('H:i', strtotime($timeService->start_time)) : date('H:i', strtotime('08:00:00'))}}">
                </div>
                <div class="col">
                    <input type="time" class="form-control" placeholder="Hora Fin" name="final_time"
                           value="{{$timeService ? date('H:i', strtotime($timeService->final_time)) : date('H:i', strtotime('17:00:00'))}}">
                </div>
            </div>
            <br>
            <button class="btn btn-info" type="submit">Guarda Horario</button>
        </form>

        <br>
        <br>


    </div>
@endsection
