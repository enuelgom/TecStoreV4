<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.css') }}">
    <title>TecStore - @yield('title')</title>
</head>
<body>
<!--Navbar-->
<div class="topnav">
        <a class="active" href="#TecStore">TecStore</a>
        <a href="./registros">Registrate</a>
        <a href="#contact">Contacto</a>
        <a href="#about">Acerca de</a>
        <div class="login-container">   
         {!! Form::open(['route'=>'log.store', 'method'=>'POST']) !!}
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            {!! Form::submit('Iniciar',['class'=>'btn btn-primary', 'id'=>'iniciar']) !!}
          {!! Form::close() !!}
        </div>
</div>   

<!--Navbar-->

    <div class="container">
      @include('ventanas.errors')
        @yield('content')
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/pooper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
</body>
</html>