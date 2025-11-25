<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion de Inventario')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --bg: #030711;
            --surface: #10172a;
            --surface-soft: rgba(255, 255, 255, 0.04);
            --surface-muted: rgba(255, 255, 255, 0.08);
            --text: #f8fbff;
            --muted: #9fb4d9;
            --primary: #8b5cf6;
            --accent: #14b8a6;
            --warning: #fbbf24;
            --danger: #f87171;
        }

        * {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        body {
            background: radial-gradient(circle at top, #111b2a, #030711 70%);
            min-height: 100vh;
            color: var(--text);
        }

        .app-navbar {
            background: rgba(3, 7, 17, 0.88);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--surface-muted);
        }

        .navbar-brand {
            font-weight: 600;
            color: var(--text) !important;
            letter-spacing: .04em;
        }

        .nav-link {
            color: var(--muted) !important;
            font-weight: 500;
            transition: color .2s ease, transform .2s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--accent) !important;
            transform: translateY(-1px);
        }

        .page-shell {
            padding-top: 110px;
            padding-bottom: 80px;
        }

        .app-card,
        .card {
            background: var(--surface);
            border: 1px solid var(--surface-muted);
            border-radius: 1rem;
            color: var(--text);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.45);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--surface-muted);
            color: var(--text);
        }

        .data-table {
            color: var(--text);
        }

        .data-table thead {
            background: var(--surface-soft);
        }

        .data-table th {
            border: none;
            font-size: .75rem;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .data-table td {
            border-color: var(--surface-muted) !important;
            color: var(--text);
        }

        .badge-soft {
            background: var(--surface-soft);
            border-radius: 999px;
            padding: .35rem .85rem;
            color: var(--accent);
            font-size: .8rem;
        }

        .btn {
            border-radius: 999px;
            border: none;
            font-weight: 600;
            letter-spacing: .02em;
        }

        .btn-primary {
            background: linear-gradient(120deg, var(--primary), var(--accent));
            box-shadow: 0 10px 30px rgba(20, 184, 166, 0.35);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.08);
        }

        .btn-outline-light {
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: var(--text);
        }

        .form-control,
        select {
            background: var(--surface-soft);
            border: 1px solid transparent;
            color: var(--text);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            color: var(--text);
            border-color: var(--primary);
            box-shadow: none;
        }

        footer {
            border-top: 1px solid var(--surface-muted);
            color: var(--muted);
            text-align: center;
            padding: 30px 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top app-navbar shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fa-solid fa-gem mr-2 text-primary"></i> InventarioApp
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="fa-solid fa-chart-line mr-1"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                            <i class="fa-solid fa-box-open mr-1"></i> Productos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('movements.*') ? 'active' : '' }}" href="{{ route('movements.index') }}">
                            <i class="fa-solid fa-arrows-rotate mr-1"></i> Movimientos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('grafics.*') ? 'active' : '' }}" href="{{ route('grafics.index') }}">
                            <i class="fa-solid fa-sheet-plastic mr-1"></i> Reportes
                        </a>
                    </li>

                    @auth
                        <li class="nav-item ml-lg-3 mt-3 mt-lg-0">
                            <form method="POST" action="{{ route('logout.perform') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm d-block d-lg-inline-block">
                                    <i class="fa-solid fa-right-to-bracket mr-1"></i> Cerrar sesion
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-fluid page-shell">
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} Sistema de Gestion de Inventario
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
