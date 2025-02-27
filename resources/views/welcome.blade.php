<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo</title>
</head>
<body>

    <h2>Subir Archivo</h2>
    
    <form action="{{route('subir')}}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div>
            <input type="text" placeholder="area" name="area_nombre">
            <br><br>
        </div>
        <div>
            <input type="text" placeholder="descirpcion" name="archivo_descripcion">
        </div>
        <br><br>

        <input type="file" class="form-control" id="archivo" name="archivo" accept="application/pdf" required>
    <br>

        <label for="archivo_id">ID del archivo:</label>
        <input type="number" name="archivo_id" id="archivo_id" required>
        <br><br>

        <label for="usuarios_id">ID del usuario:</label>
        <input type="number" name="usuarios_id" id="usuarios_id" required>
        <br><br>

        <button type="submit">Subir Archivo</button>
    </form>

</body>
</html>
