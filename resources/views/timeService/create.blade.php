@extends('plantilla')
@section('seccion')



@error("diaInicio")
    <div class="alert alert-danger container">
        Campos vacios
    </div>
@enderror
@error("diaFin")
    <div class="alert alert-danger container">
        Campos vacios
    </div>
@enderror
@error("horaInicio")
    <div class="alert alert-danger container">
        Campos vacios
    </div>
@enderror

@error("horaFin")
    <div class="alert alert-danger container">
        Campos vacios
    </div>
@enderror




<div class="container">
    <form method="POST" action="{{route('timeservice.store')}}">
    @csrf

    <br>
    <div class="row">
        <div class="col">
        <select class="custom-select" name="diaInicio"> 
            <option value="Lunes" selected>Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sabado">Sabado</option>
            <option value="Domingo">Domingo</option>
        </select>
        </div>
        <div class="col">
        <select class="custom-select" name="diaFin"> 
            <option value="Lunes" selected>Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sabado">Sabado</option>
            <option value="Domingo">Domingo</option>
        </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
        <input type="time" class="form-control" placeholder="Hora Inicio" name="horaInicio">
        </div>
        <div class="col">
        <input type="time" class="form-control" placeholder="Hora Fin" name="horaFin">
        </div>
    </div>
    <br>
    <button class="btn btn-info" type="submit">Guarda Horario </button>
    </form>

    <br>
    <br>

   
    </div>
@endsection