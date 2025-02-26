<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/subirarchivos.css') }}">
    {{-- @vite('resources/css/subirarchivos.css')
    @vite('resources/js/auth.js') --}}
</head>
{{-- 
@extends('layouts.navarprincipal')
@section('content') --}}   

    <body class="formulario">
        <div class="container">


            <div class="contenedor">
            

                <form action="" method="POST"  enctype="multipart/form-data" class="form form_front">
                    <div class="form_details">Subir Archivo</div>
                    @csrf
                    
                <label for="archivo">Seleccionar Archivo</label>
                <input type="file" name="archivo" class="input" required>

                

                <label for="fecha_subida">Fecha de Subida</label>
                <input type="date" name="fecha_subida" class="input" required>

                <label for="tipo_archivo">Tipo de Archivo</label>
                <input type="text" name="tipo_archivo" class="input" placeholder="Tipo de Archivo" required>

                <div class="mb-3 label">
                    <label for="archivos_id" class=" label form-label">archivos id:</label>
                    <input type="number" name="archivos_id">
                    {{-- <select class="form-select" id="archivos_id" name="archivos_id" required>
                        <option value="">Selecciona un grupo</option>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->nombre_grupo }}</option>
                        @endforeach
                    </select> --}}
                </div>

                <div class="mb-3 label">
                    <label for="usuarios_id" class=" label form-label">usuarios id:</label>
                    <select class="form-select " id="usuarios_id" name="usuarios_id" required>
                        <option value="">Selecciona un usuario</option>
                        {{-- @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->nombre_grupo }}</option>
                        @endforeach --}}
                    </select>
                </div>

                    <input type="file" name="ruta_email" class="input" placeholder="ruta archivo" required>
                    <input type="date" name="date" class="input" placeholder="fecha subida" required>
                    
                    <button class="btn" type="submit">subir archivo</button>
                    
                </form>
            </div>
        </div>
    </body>
{{-- @endsection --}}

</html>


