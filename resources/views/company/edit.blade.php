@extends('plantilla')


@section('seccion')
    @if(session('message'))
        <div class="alert alert-success"> {{session('message')}}</div>
    @endif

    @if($errors->has('message'))
        <div class="alert alert-danger"> {{$errors->first('message')}}</div>
    @endif

    <header class="user-header">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt=""/>
        <h1 class="user__title">Editar Compañía</h1>
    </header>

    <div class="row col-xs-6 col-sm-6 col-lg-6">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <form class="form" action="{{url('company', $company->id)}}" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="nit">NIT</label>
                    <input id="nit" type="text" placeholder="NIT" class="form-control" name="nit"
                           value="{{old('nit', $company->nit)}}"/>
                    @error('nit')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" placeholder="Nombre" class="form-control" name="name"
                           value="{{old('name', $company->name)}}"/>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
