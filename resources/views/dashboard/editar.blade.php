<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite('resources/css/editararchivos.css')
    @vite('resources/js/auth.js') --}}
    <link rel="stylesheet" href="{{ asset('css/editararchivos.css') }}">
</head>

<body>
    @extends('layouts.prueba')
    @section('content')
    
        <div class="containerForm">
            
            <form class="formularioeditar" action="{{route('subir')}}" method="POST" enctype="multipart/form-data">
                <h2 class="text-center mb-4">Editar Archivo</h2>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                    <label for="">Area</label>
                    <input class="inputs" type="text" placeholder="Area" name="area_nombre">
               
                    <label for="">Descripción</label>
                    <input class="inputs" type="text" placeholder="Descirpcion" name="archivo_descripcion">
                
                <input type="file" class="form-control" id="archivo" name="archivo" accept="application/pdf" required>
                
                
                <button class="btn" type="submit">Subir Archivo</button>
            </form>
        </div>

 
       
    

</body>

@endsection
</html>