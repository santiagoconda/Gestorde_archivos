<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pruebas</title>
</head>
<body>
    <div>
        @foreach ($roles as $item)
            <p>{{$item->nombre}}</p>
        @endforeach
        
    </div>
</body>
</html>