@extends('plantilla')

@section('seccion')

    @if(session('message'))
        <div class="alert alert-success"> {{session('message')}}</div>
    @endif

    @if($errors->has('message'))
        <div class="alert alert-danger"> {{$errors->first('message')}}</div>
    @endif

    <form class="form" method="post" action="{{url('rate', $id)}}">
        @csrf

        <div class="form-group">
            @for($i = 1; $i<=10; $i++)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="score" id="{{'rate'.$i}}"
                           value="{{$i}}" @if(old('score') == $i) checked @endif>
                    <label class="form-check-label" for="{{'rate'.$i}}">{{$i}}</label>
                </div>
            @endfor

            @error('score')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div class="form-group">
            <label for="comment">Comentario</label>
            <textarea class="form-control" placeholder="Comentario" id="comment"
                      name="comment">{{old('comment')}}</textarea>

            @error('comment')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <button class="btn btn-primary" type="submit">Calificar servicio</button>
    </form>
@endsection
