<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Inventario')</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background: linear-gradient(90deg, #007bff, #17a2b8);
        }

        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #ffc107 !important;
        }

        footer {
            background: #343a40;
            color: #ccc;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 14px;
        }

        main {
            padding-top: 80px; /* espacio para el navbar */
            padding-bottom: 60px; /* espacio para el footer */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fa-solid fa-boxes-stacked mr-2"></i> InventarioApp
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <!-- Productos -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('products.index')}}">
                            <i class="fa-solid fa-box-open mr-1"></i> Productos
                        </a>
                    </li>

                    <!-- Movimientos -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('movements.index')}}">
                            <i class="fa-solid fa-arrows-rotate mr-1"></i> Movimientos
                        </a>
                    </li>

                    <!-- Regresar al Login -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Home')}}">
                            <i class="fa-solid fa-right-to-bracket mr-1"></i> Regresar al Login
                        </a>
                    </li>

                    <!-- Reportes -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Home')}}">
                            <i class="fa-solid fa-sheet-plastic"></i> Reportes
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} Sistema de Gestión de Inventario - Desarrollado con Laravel & Bootstrap
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>