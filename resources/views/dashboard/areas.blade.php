<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Areas</title>
    <link rel="icon" type="image" href="{{ asset('storage/logos/horizontal_full_color.png') }}">
    {{-- @vite('resources/css/editararchivos.css')
    @vite('resources/js/auth.js') --}}
    <link rel="stylesheet" href="{{ asset('css/areas.css') }}">
</head>
 @extends('layouts.prueba') 
 @section('content')
<body>

    <div class="contenedor-formulario">
        <h2 class="titulo-formulario">Gestión de Áreas</h2>
        
        <form action="/guardar-area" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre del Área</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el nombre del área" required>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select id="estado" name="estado" class="form-control" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-enviar">Guardar</button>
            </div>
        </form>
    </div>

</body>
@endsection
</html>