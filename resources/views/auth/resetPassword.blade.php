<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restablecer contraseña</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @vite('resources/css/styleRecuperarcontraseña.css')
    @vite('resources/js/auth.js')
</head>

@extends('layouts.navarprincipal')
@section('content')

    <body class="formulario">

           {{-- <div id="formRestablecer">
        <form action="{{route('password.update')}}" method="post">
            @csrf
            <input type="email" name="email" placeholder="Correo electronico">
            <input type="password" name="password" placeholder="Nueva contraseña">
            <button type="submit">Restablecer contraseña</button>
        </form>
    </div> --}}

        <div class="container">
            <input id="signup_toggle" type="checkbox">

            <div class="form_front">
                
                <form action="{{ route('password.update') }}" method="post" class="form">
                    @csrf
                    <div class="form_front">
                        <div class="form_details">Restablecer Contraseña</div>
                        <input type="email" name="email" class="input" placeholder="Correo Electronico">
                        <input type="password" name="password" class="input" placeholder="Nueva contraseña">
                        <button type="submit" class="btn">Restablecer contraseña</button>

                    </div>
                </form>
            </div>
        </div>


    </body>
@endsection

</html>
