@extends('plantilla')


@section('seccion')
    @if(session('mensaje'))
        <div class="alert alert-success"> {{session('mensaje')}}</div>
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12" >
            <div class="user">
                <header class="user-header">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
                    <h1 class="user__title">Editar Asesores</h1>
                </header>
                <form class="form" action="{{route('users.update',$users->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input type="number" placeholder="Identificación" class="form-input" name="identification" value="{{$users->identification}}"/>
                        {!! $errors->first('identification', '<p class="help-block">:message</p>') !!}    
                    </div>
                    
                    <div class="form-group">
                        <input type="text" placeholder="Nombre" class="form-input" name="name" value="{{$users->name}}"/>
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}    
                    </div>
                    
                    <div class="form-group">
                        <input type="email" placeholder="Correo" class="form-input" name="email"  value="{{$users->email}}" />
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}    
                    </div>
                    
                    <div class="form-group">
                        <input type="password" placeholder="Contraseña" class="form-input" name="password"  />
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}      
                    </div>

                    <button class="btn btn-primary" type="submit">Editar Usuario</button>
                </form>
            </div>
        </div>
    </div>
@endsection