<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restablecer contraseña</title>
</head>
<body>

    <br>
    <div id="formRestablecer">
        <form action="{{route('password.update')}}" method="post">
            @csrf
            <input type="email" name="email" placeholder="Correo electronico">
            <input type="password" name="password" placeholder="Nueva contraseña">
            <button type="submit">Restablecer contraseña</button>
        </form>
    </div>
</body>
</html> 