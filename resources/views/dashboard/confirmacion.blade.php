<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmacion</title>

    <!-- Estilos CSS de Bootstrap y DataTables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body>
    @extends('layouts.prueba')
    @section('content')
<div class="contenedor">
        
  <div class="cards">
      <div class="cards2">
          <h1>!GRACIAS¡</h1>
          <p>Realizamos tu petición con éxito.</p>
        

      </div>

  </div>
 
</div>


</body>

@endsection
</html>
<style>
.contenedor{
margin-top: 20vh;
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
animation: bounceIn 0.8s ease-in-out;

}

@keyframes bounceIn {
    0% {
        opacity: 0;
        transform: scale(0.8);
    }
    50% {
        opacity: 1;
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
    }
}

.cards{
padding: 25px;
border-radius: 10px;
background: white;
height: auto;
width: 400px;
display: flex;
justify-content: center;
align-items: center;
text-align: center;
font-family: "Signika", sans-serif;

box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
}
.cards2{
padding: 25px;
border-radius: 10px;
background: #f7d7218c;
border:1px solid #f79a21;
color: #032840;
font-family: "Signika", sans-serif;

}


</style>