<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creacion de Roles</title>
    <link rel="icon" type="image" href="{{ asset('storage/logos/horizontal_full_color.png') }}">
    {{-- @vite('resources/css/editararchivos.css')
    @vite('resources/js/auth.js') --}}
    <link rel="stylesheet" href="{{ asset('css/creacionRoles.css') }}">
</head>
@extends('layouts.prueba')
@section('content')
<body>
    <div class="contenedor-formulario">
        <h2 class="titulo-formulario">Crear Nuevo Rol</h2>

        <form action="{{ route('crear.rol') }}" method="POST">
            @csrf

            <!-- Campo para el nombre del rol -->
            <div class="form-group">
                <label for="nombre">Nombre del Rol</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el nombre del rol" required>
            </div>

            <!-- Checkboxes para los permisos -->
            <div class="form-group">
                <label>Permisos</label>
                <div class="permisos-container">
                    @php
                        $permisos = ['crear' => 'Crear', 'ver' => 'Ver', 'actualizar' => 'Actualizar', 'eliminar' => 'Eliminar'];
                    @endphp
                    @foreach ($permisos as $permiso => $label)
                        <label class="checkbox-label">
                            <input type="hidden" name="{{ $permiso }}" value="0"> 
                            <input type="checkbox" name="{{ $permiso }}" value="1"> {{ $label }}
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Botón de envío -->
            <div class="form-group">
                <button type="submit" class="btn-enviar">Guardar Rol</button>
            </div>
        </form>
    </div>
</body>

@endsection
</html>