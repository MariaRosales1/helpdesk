<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head> 
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<title>Sesión cliente</title>
    
        <style  type="text/css">

                /*
                * General styles
                */

                body, html{
                    height: 100%;
                    background-repeat: no-repeat;
                    background-color: #d3d3d3;
                    font-family: 'Oxygen', sans-serif;
                font-size: 12px;
                }

                .main{
                    margin-top: 70px;
                }

                h1.title { 
                font-size: 50px;
                font-family: 'Passion One', cursive; 
                font-weight: 400; 
                }

                hr{
                width: 10%;
                color: #fff;
                }

                .form-group{
                margin-bottom: 15px;
                }

                label{
                margin-bottom: 14px;
                }

                input,
                input::-webkit-input-placeholder {
                font-size: 9px;
                padding-top: 3px;
                }

                .main-login{
                    background-color: #fff;
                /* shadows and rounded borders */
                -moz-border-radius: 2px;
                -webkit-border-radius: 2px;
                border-radius: 2px;
                -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

                }

                .main-center{
                    margin-top: 30px;
                    margin: 0 auto;
                    max-width: 330px;
                padding: 40px 40px;

                }

                .login-button{
                margin-top: 3px;
                }

                .login-register{
                font-size: 8px;
                text-align: center;
                }

            </style>
    </head>


    <body>
            
            @if(session('mensaje'))
                <div class="alert alert-success"> {{session('mensaje')}}</div>
            @endif
        <div class="container">
            <div class="row main">
                <div class="panel-heading">
                @if($enableButton==0)
                    <div class="panel-title text-center">
                            <h2 class="title">Ingresa a una sesión</h1>
                            <hr />
                        </div>  
                    </div> 
                @endif
                <div class="main-login main-center">
                @if($enableButton==0)
                    <form class="form-horizontal" action="{{url('registerCustomer')}}" method="post" >
                        
                        @csrf
                        
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Nombre</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" id="name"  placeholder="Tu nombre"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Correo</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="email" id="email"  placeholder="Tu correo"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <button  type="submit" class="btn btn-primary btn-lg btn-block login-button">Enviar</button>
                        </div>
                    </form>
                    @else



                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf    
                            <div class="form-group row" style="display:none">    
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email" autofocus>    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row" style="display:none">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  value="123456789" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
    
                                        {{ __('Iniciar chat') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                    
                    
                        {{-- <a href="{{url('chatCustomer')}}" class="btn btn-warning btn-sm" style="margin-left:15% ; width:70% !important">Iniciar Chat</a>  --}}
                    @endif

                    
                </div>
            </div>



        </div>
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>