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


@extends('layouts.navarprincipal')
@section('content')
<body >
<div id="enviarCorreo" class="form_email">
        <div class="form_wrapper">
            <div class="form_details">Recupera tu Contraseña</div>
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Correo Electrónico" required>
                <button class="btn" type="submit">Restablecer Contraseña</button>
            </form>
        </div>
    </div>
</body>
@endsection

</html>