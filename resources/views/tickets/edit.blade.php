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

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12" >
            <div class="user">
                <header class="user-header">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
                    <h1 class="user__title">Editar tickets</h1>
                </header>
                <form class="form" action="{{route('tickets.update',$ticket)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input type="text" placeholder="nota del ticket" class="form-input" name="note" value="{{$ticket->note}}"/>
                        {{--  {!! $errors->first('identification', '<p class="help-block">:message</p>') !!}      --}}
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Cerrar ticket</button>
                </form>
            </div>
        </div>
    </div>
@endsection