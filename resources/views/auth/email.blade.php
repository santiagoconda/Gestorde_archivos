<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <link rel="icon" type="image" href="{{ asset('storage/logos/horizontal_full_color.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/email.css') }}">

    {{-- @vite('resources/css/styleLogin.css')
    @vite('resources/js/auth.js') --}}
</head>
@extends('layouts.navarprincipal')
@section('content')

    <body class="formularios">
        <div class="contenedor">
            <input id="signup_toggle" type="checkbox">

            <div class="form_wrap">
                <form action="{{ route('password.email') }}" method="POST" class="forms forms_fronttS">
                    @csrf
                    <div class="forms_details">RECUPERACION DE CONTRASEÑA</div>
                    <input type="email" name="email" class="input" placeholder="Correo Electrónico" required>
                    <button class="btn" type="submit">Restablecer Contraseña</button>
                    
                </form>

                
            </div>
        </div>
    </body>
@endsection

</html>
