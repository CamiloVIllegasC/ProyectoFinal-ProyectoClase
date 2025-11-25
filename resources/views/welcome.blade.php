<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InventarioApp · Acceso</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --bg: #030711;
            --surface: rgba(16, 23, 42, 0.85);
            --surface-soft: rgba(255, 255, 255, 0.08);
            --text: #f8fbff;
            --muted: #9fb4d9;
            --primary: #8b5cf6;
            --accent: #14b8a6;
        }

        * {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        body {
            background: radial-gradient(circle at top, #1d2342, var(--bg) 70%);
            color: var(--text);
            min-height: 100vh;
        }

        .hero-grid {
            position: relative;
            padding: 2rem;
        }

        .shine {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 20%, rgba(20, 184, 166, 0.25), transparent 45%),
                radial-gradient(circle at 80% 10%, rgba(139, 92, 246, 0.3), transparent 40%);
            filter: blur(40px);
            z-index: 0;
        }

        .login-card {
            background: var(--surface);
            border-radius: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 30px 100px rgba(0, 0, 0, 0.45);
            position: relative;
            z-index: 1;
        }

        .login-card h4 {
            font-weight: 600;
        }

        label {
            color: var(--muted);
            font-size: .9rem;
        }

        .form-control {
            background: var(--surface-soft);
            border: 1px solid transparent;
            color: var(--text);
            border-radius: 12px;
            padding: .85rem 1rem;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: var(--primary);
            box-shadow: none;
            color: var(--text);
        }

        .btn-primary {
            background: linear-gradient(120deg, var(--primary), var(--accent));
            border: none;
            border-radius: 999px;
            padding: .75rem 1.75rem;
            font-weight: 600;
            box-shadow: 0 15px 40px rgba(20, 184, 166, 0.35);
        }

        .btn-outline-light {
            border-radius: 999px;
            padding: .75rem 1.75rem;
            border-color: rgba(255, 255, 255, 0.4);
            color: var(--text);
        }

        .floating-card {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 1.25rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="container py-5 hero-grid">
        <div class="shine"></div>
        <div class="row align-items-center position-relative">
            <div class="col-lg-6 mb-5 mb-lg-0 text-white">
                <p class="text-uppercase text-muted mb-2 small">InventarioApp</p>
                <h1 class="display-5 font-weight-bold mb-3">Gestiona tu inventario con estilo.</h1>
                <p class="text-muted mb-4">
                    Visualiza tus productos, registra movimientos y obtén reportes visuales en segundos.
                    Un panel moderno para decisiones mas rapidas.
                </p>

                <div class="floating-card">
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <span class="badge badge-pill badge-light text-dark">Nuevo</span>
                        </div>
                        <div>
                            <h6 class="mb-0 text-white">Dashboard con graficos</h6>
                            <small class="text-muted">Explora indicadores en tiempo real despues de iniciar
                                sesion.</small>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-5 ml-lg-auto">
                <div class="card login-card p-4 p-lg-5">
                    <h4 class="mb-2">Bienvenido de nuevo</h4>
                    <p class="text-muted mb-4">Ingresa tus credenciales para continuar.</p>

                    <form action="{{ route('login.perform') }}" method="POST" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="email">Correo electronico</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="admin@inventario.com" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Contrasena</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="********" required>
                        </div>

                        @if ($errors->has('email'))
                            <div class="alert alert-danger border-0 rounded-lg">
                                {{ $errors->first('email') }}
                            </div>
                        @endif

                        <div class="mt-4 d-flex flex-column">
                            <button type="submit" class="btn btn-primary mb-2">Iniciar sesion</button>
                            <button type="reset" class="btn btn-outline-light mb-2">Limpiar</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
