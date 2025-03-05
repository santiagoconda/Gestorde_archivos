<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>

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
        <table id="tb_usuers" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>nombre de Usuario</th>
                    <th>Correo Electronico</th>
                    <th>Rol</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $item) 
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->roles->nombre}}</td>                        
                        {{-- <td>
                            <a href="{{route('editar.archivos',$archivo->id)}}" ><i class="fa-solid fa-pen-to-square fa-lg text-warning" title="Actualizar archivo" aria-hidden="true"></i></a>

                            <form action="{{route('eliminar.archivo',['id'=>$archivo->id]) }}" title="el" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="   border:none; cursor: pointer;"><i class="fa-solid fa-trash fa-lg text-danger" title="Eliminar archivo" aria-hidden="true"></i></button>
                                   
                            </form>
                           
                            </td> --}}
                       
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



    
