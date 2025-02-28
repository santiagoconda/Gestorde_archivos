<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restablecer contraseña</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{-- @vite('resources/css/styleRecuperarcontraseña.css')
    @vite('resources/js/auth.js') --}}
    <link rel="stylesheet" href="{{ asset('css/styleRecuperarcontraseña.css') }}">

</head>

@extends('layouts.navarprincipal')
@section('content')

    <body class="formulary">
        <div class="containers">
            <input id="signup_toggle" type="checkbox">

          
            <div class="form_wrapp">
                <form action="{{ route('password.update') }}" method="POST" class="form formm_front">
                    <div class="form_detalles">Restablecer Contraseña</div>
                        <input type="email" name="email" class="input" placeholder="Correo Electronico">
                        <input type="password" name="password" class="input" placeholder="Nueva contraseña">
                        <button type="submit" class="btn">Restablecer contraseña</button> 
                </form>
            </div>
        </div>
    </body>
@endsection
</html>
