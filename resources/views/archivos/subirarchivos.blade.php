<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir Archivos</title>
    <link rel="icon" type="image" href="{{ asset('storage/logos/horizontal_full_color.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/subirarchivos.css') }}">
     {{-- @vite('resources/css/subirarchivos.css')
    @vite('resources/js/auth.js') --}}
</head>
@extends('layouts.prueba')
@section('content')
<body class="bodysubirarchivos">
    <div class="containerform">
        <div class="form">
            <h2 class="text-center mb-4">Subir Archivos</h2>
            <form action="{{route('subir')}}" method="POST" enctype="multipart/form-data" class="formulariosubir">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" class="formularioinputs">
                <div>
                    <input type="text" placeholder="area" name="area_nombre" class="formularioinputs">
                   
                </div>
                <div>
                    <input type="text" placeholder="descirpcion" name="archivo_descripcion" class="formularioinputs">
                </div>
                <input type="file" class="form-control" id="archivo" name="archivo" accept="application/pdf"  class="formularioinputs" required>

                <button class="btnsubir" type="submit">Subir Archivo</button>
            </form>

        </div>
        

    </div>
   
</body>
@endsection

</html>



