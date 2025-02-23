<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @vite('resources/css/styleLogin.css')
    @vite('resources/js/auth.js')
</head>
@extends('layouts.navarprincipal')
@section('content')
<body>
    <div id="loginForm" class="divPadre">
        <div class="imagenCont">
            
        </div>
       
        <form class="divHijo" action="{{route('login.usuarios')}}" method="POST">
            <div class="bienvenido_de_nuevo">
                <h3>BIENVENIDO DE NUEVO</h3>
            </div>
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div>
                <label for="inputPassword5" class="form-label">Contraseña</label>
                <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            </div>
              <a href="{{route('password.request')}}">Has olvidado tu contraseña?</a>
            <div class="divNieto">
                <button type="submit">Inicaiar sesión</button>
                <button id="toggleButton" onclick="formsDinamicos('register')">¿No tienes cuenta? Registrate</button>

            </div>
        </form>
 
    </div>
    <br>
    
    
    <div id="registerForm"style="display:none;"  class="divHijo">
        <h3>Register</h3>
        <form action="{{route('registrar.usuarios')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Registrarse</button>
        </form>
    </div>
    <br>

</body>
@endsection

</html>
<script>
    function formsDinamicos(formType) {
    console.log('desde vite la funcion a sido llamada' );
    if (formType === 'login') {
        document.getElementById('loginForm').style.display = 'block';
        document.getElementById('registerForm').style.display = 'none';
        document.getElementById('toggleButton').innerText = '¿No tienes cuenta? Regístrate';
    } else if (formType === 'register') {
        document.getElementById('loginForm').style.display = 'none';
        document.getElementById('registerForm').style.display = 'block';
        document.getElementById('toggleButton').innerText = '¿Ya tienes cuenta? Inicia sesión';
    }
}


</script>