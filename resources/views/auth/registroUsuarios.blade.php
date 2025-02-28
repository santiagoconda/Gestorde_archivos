<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{-- @vite('resources/css/styleLogin.css')
    @vite('resources/js/auth.js') --}}
    <title>Añadir Usuarios</title>
</head>
<body class="formulario">
    <div class="container">
        <input id="signup_toggle" type="checkbox">

            <form action="{{ route('registrar.usuarios') }}" method="POST" class="form form_back">
                @csrf
                <div class="form_details">Registrar Usuarios</div>
                <input type="text" name="name" class="input" placeholder="Nombre Usuario" required>
                <input type="email" name="email" class="input" placeholder="Correo Electrónico" required>

                <select class="form-select" id="rol_id" name="rol_id" required>
                    <option value="">Selecciona un  rol</option>
                    @foreach ($roles as $item)
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
                <input type="password" name="password" class="input" placeholder="Contraseña" required>
                <button class="btn" type="submit">Registrarme</button>
                <span class="switch">
                    ¿Ya tienes una cuenta?
                    <label for="signup_toggle" class="signup_tog">Iniciar sesión</label>
                </span>
            </form>
        </div>
    </div>
</body>
</html>