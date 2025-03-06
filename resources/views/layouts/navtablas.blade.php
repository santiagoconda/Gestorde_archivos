<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administración')</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    

    @vite('resources/css/administracion.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    
    
    <header class="headePadre">
        <div class="imagen">
            <img class="verticalAmarillo"src="{{ asset('storage/logos/horizontal_full_color.png') }}" alt="verticalAmarillo" />
        </div>
        <div class="titulosNav">
            <h3>Gestion de Archivos</h3>
        </div>
    </header>
    

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-12 col-md-3 sidebar vh-100 d-none d-md-block" style="color: #333; box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2); background-color: #f8f9fa;">
                <h4 class="text-center py-3">
                    <i class="fas fa-tachometer-alt me-2"></i> <!-- Logo de dashboard -->
                    Menú
                </h4>
              
    
               
                
             
            </div>
    
            <!-- Navbar para móviles -->
            <nav class="navbar navbar-expand-md navbar-light bg-light d-md-none">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <span class="navbar-brand">
                        <i class="fas fa-tachometer-alt me-2"></i> Menú
                    </span>
                    <div class="collapse navbar-collapse" id="navbarMenu">
                        <ul class="navbar-nav">
                            <li class="nav-item">

                                <a class="d-block py-2 px-3 sidebar-link"  href="{{ route('ver.archivos') }}">
                                    <i class="fa-solid fa-house"></i> Inicio
                                </a>
                                
                            
                        </ul>
                    </div>
                </div>
            </nav>
            
            <!-- Contenido principal -->
            <main  class="col-12 col-md-9 mt-4">
                @yield('content')
            </main>
        </div>
    </div>
    <footer class="text-center py-5 ">
        <div class="container">
            <p class="mb-2">
                Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación Nacional – Resolución No. 944 de 1996 MEN – SNIES 2731
            </p>
            <p class="mb-2">
                <strong>Sede Principal:</strong> Cra. 122 No. 12-459 Pance, Cali – Colombia<br>
                Teléfonos: +57 (2) 555 2767 – +57 (2) 312 0038

            <p class="small mb-0">© 2025 Universidad Católica. Todos los derechos reservados.</p>
        </div>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>