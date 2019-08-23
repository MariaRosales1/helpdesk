@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Asesores Chat</div>

                <div class="card-body" id="app">
                    <chat-app :user = "{{auth()->user()}}"></chat-app>
                </div>

                @if(Auth::user()->rol == 'customer')
                    <div class="" aria-labelledby="">
                            <a class="btn btn-primary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>
                    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endif
              
            </div>
        </div>
    </div>
</div>
@endsection


