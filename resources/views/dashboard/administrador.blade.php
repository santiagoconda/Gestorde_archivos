<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <!-- Estilos CSS de Bootstrap y DataTables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    @vite('resources/js/dashboard.js')
</head>

<body>
@extends('layouts.prueba')
@section('content')

    <div class="container mt-4">
        <table id="tb_archivos" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre del Archivo</th>
                    <th>Tipo de Archivo</th>
                    <th>Nombre de Usuario</th>
                    <th>Fecha</th>
                    <th>Area</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($archivos as $archivo) 

                
                    <tr>
                        <td>{{$archivo->nombre_archivo}}</td>
                        <td>{{$archivo->tipo_archivo}}</td>
                        <td>{{ optional ($archivo->users)->name}}</td>
                        <td>{{$archivo->fecha_subida}}</td>
                        
                        <td>{{$archivo->archivos->areas->nombre}}</td>
                        <td>
                            <a href="{{ route('descargar.archivos', $archivo->id) }}" title="Descargar archivo" class="icons"> <i class="fa fa-download fa-lg text-success" aria-hidden="true"></i></a>                     
                            <a><i class="fa-solid fa-eye fa-lg text-primary" onclick="previsualizarArchivo({{ $archivo->id }})" title="Ver archivo" aria-hidden="true"></i></a>

                            <a href="{{route('editar.archivos',$archivo->id)}}" ><i class="fa-solid fa-pen-to-square fa-lg text-warning" title="Actualizar archivo" aria-hidden="true"></i></a>

                            <form action="{{route('eliminar.archivo',['id'=>$archivo->id]) }}" title="el" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="   border:none; cursor: pointer;"><i class="fa-solid fa-trash fa-lg text-danger" title="Eliminar archivo" aria-hidden="true"></i></button>
                                   
                            </form>
                           
                            </td>
                       
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>

@endsection
</html>
    <!-- Scripts al final del body -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts de DataTables -->
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.min.js"></script>



<script>
    function previsualizarArchivo(archivoId) {
        fetch(`/visualizar/archivo/${archivoId}`)
            .then(response => response.json())
            .then(data => {
                if (data.url) {
                    window.open(data.url, '_blank'); 
                } else {
                    alert('No se pudo cargar la vista previa.');
                }
            })
            .catch(error => console.error('Error:', error));
    }
    </script>
    
