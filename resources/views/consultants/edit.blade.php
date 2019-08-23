@extends('plantilla')


@section('seccion')
    @if(session('mensaje'))
        <div class="alert alert-success"> {{session('mensaje')}}</div>
    @endif

    {{--  @if(!$errors->isEmpty())
        <div class="alert alert-danger container">
            Se debe llenar todos los campos
        </div>
    @endif  --}}

    @if(session('mensajeError'))
        <div class="alert alert-danger"> {{session('mensajeError')}}</div>
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12" >
            <div class="user">
                <header class="user-header">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
                    <h1 class="user__title">Editar Asesores</h1>
                </header>
                <form class="form" action="{{route('consultants.update',$consultant->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input type="number" placeholder="Identificación" class="form-input" name="identification" value="{{$consultant->identification}}"/>
                        {!! $errors->first('identification', '<p class="help-block">:message</p>') !!}    
                    </div>
                    
                    <div class="form-group">
                        <input type="text" placeholder="Nombre" class="form-input" name="name" value="{{$consultant->name}}"/>
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}    
                    </div>
                    
                    <div class="form-group">
                        <input type="email" placeholder="Correo" class="form-input" name="email"  value="{{$consultant->email}}" />
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}    
                    </div>
                    
                    <div class="form-group">
                        <input type="password" placeholder="Contraseña" class="form-input" name="password" />
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}    
                    </div>

                    <button class="btn btn-primary" type="submit">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection