<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- @vite('resources/css/styleRecuperarcontraseña.css')
    @vite('resources/js/auth.js') -->

     <link rel="stylesheet" href="{{ asset('css/email.css') }}"> 

    <title>Enviar correo</title>
</head>






    <body class="formulario">
        @extends('layouts.navarprincipal')
        @section('content')
        <div class="container">
            <input id="signup_toggle" type="checkbox">

            <div class="form_wrapper">
        
                    <form action="{{ route('password.email') }}" method="POST" class="form form_front">
                        @csrf
                        <div class="form_details">BIENVENIDO DE NUEVO emaill</div>
                        <input type="email" name="email" class="input" placeholder="Correo Electrónico" required>
                        <input type="password" name="password" class="input" placeholder="Contraseña" required>
                        <button class="btn" type="submit">Restablecer Contraseña</button>
                        
        
                    </form>
           
            </div>
        </div>
        @endsection
    </body>
   
</html>