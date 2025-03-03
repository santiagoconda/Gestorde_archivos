<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" type="image" href="{{ asset('storage/logos/horizontal_full_color.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @vite('resources/css/styleLogin.css')
    @vite('resources/js/auth.js')
</head>
@extends('layouts.navarprincipal')
@section('content')

    <body class="formulario">
        <div class="container">
            <input id="signup_toggle" type="checkbox">

            <!-- Contenedor de formularios -->
            <div class="form_wrapper">
                <!-- Formulario de inicio de sesión -->
                <form action="{{ route('login.usuarios') }}" method="POST" class="form form_front">
                    @csrf
                    <div class="form_details">BIENVENIDO DE NUEVO</div>
                    <input type="email" name="email" class="input" placeholder="Correo Electrónico" required>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="password" name="password" class="input" placeholder="Contraseña" required>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button class="btn" type="submit">Iniciar Sesión</button>
                    <span class="switch">
                        ¿No tienes cuenta?
                        <label for="signup_toggle" class="signup_tog">Regístrate</label>
                    </span>
                    <a href="{{ route('password.request') }}">¿Has olvidado tu contraseña?</a>
                </form>

               
            </div>
        </div>
    </body>
@endsection

</html>
