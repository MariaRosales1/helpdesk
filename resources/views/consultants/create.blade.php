@extends('plantilla')

@section('seccion')
    @if(session('mensaje'))
        <div class="alert alert-success"> {{session('mensaje')}}</div>
    @endif

    @if(!$errors->isEmpty())
        <div class="alert alert-danger container    ">
            Se debe llenar todos los campos
        </div>
    @endif

    <div class="panel-body">
       
            <div class="user">
                <header class="user__header">                
                    <h1 class="user__title">Registro de Asesores en el Sistema</h1>
                </header>


                <form class="form" action="{{route('consultants.store')}}" method="post">                                    
                    @csrf
                    <div class="form-group">
                        <input type="number" placeholder="Identificación" class="form-input" name="identification" />
                        {!! $errors->first('identification', '<p class="help-block">:message</p>') !!}    
                    </div>
                    
                    <div class="form-group">
                        <input type="text" placeholder="Nombre" class="form-input" name="name" />
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}    
                    </div>
                    
                    <div class="form-group">
                        <input type="email" placeholder="Correo" class="form-input" name="email"  />
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}    
                    </div>
                    
                    <div class="form-group">
                        <input type="password" placeholder="Contraseña" class="form-input" name="password"  />
                        {!! $errors->first('pasword', '<p class="help-block">:message</p>') !!}    
                    </div>

                    <button class="btn btn-primary" type="submit">Guardar Asesor</button>
                </form>
            </div>
        
    </div>
@endsection