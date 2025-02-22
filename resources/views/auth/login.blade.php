<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div>
        <h3>Login</h3>
        <form action="{{route('login.usuarios')}}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <a href="">Has olvidado tu contraseña?</a>
            <button type="submit">Inicaiar sesión</button>
        </form> 
    </div>
    <br>
    <div>
        <h3>Register</h3>
        <form action="{{route('registrar.usuarios')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Registrarse</button>
        </form>
    </div>

</body>
</html>