<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #141e30, #243b55);
            color: #e9ecef;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            margin-top: 60px;
            background-color: #1f2833;
            border: 1px solid #0b0c10;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
            border-radius: 12px;
        }

        .card-header {
            background: linear-gradient(90deg, #0b8793, #360033);
            border-bottom: none;
        }

        .card-header h4 {
            margin: 0;
            font-weight: bold;
        }

        .form-control {
            background-color: #2c3e50;
            border: 1px solid #34495e;
            color: #e9ecef;
        }

        .form-control:focus {
            background-color: #2c3e50;
            border-color: #00bcd4;
            color: #fff;
            box-shadow: none;
        }

        label {
            color: #cfd8dc;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #1e7e34;
        }

        .vector-container {
            text-align: center;
            margin-top: 50px;
        }

        .vector-container svg {
            width: 60%;
            max-width: 600px;
            height: auto;
        }

        .text-muted {
            color: #adb5bd !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Formulario de Login -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center text-white">
                        <h4>🔐 Login - Gestión de Inventario</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <!-- Correo -->
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" id="email" name="email" class="form-control" required placeholder="Ejemplo: admin@inventario.com">
                            </div>

                            <!-- Contraseña -->
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control" required placeholder="Ingrese su contraseña">
                            </div>

                            <!-- Botones -->
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-primary px-4">Ingresar</button>
                                <a href="#" class="btn btn-secondary px-4">Cancelar</a>
                                <a href="{{route('products.index')}}" class="btn btn-success px-4">Entrar al Menu (Sin Login)</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vector alusivo al inventario -->
        <div class="vector-container">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 901.5 700">
                <rect width="901.5" height="700" fill="#141e30"/>
                <rect x="180" y="300" width="120" height="300" fill="#00bcd4" opacity="0.9"/>
                <rect x="340" y="220" width="120" height="380" fill="#4caf50" opacity="0.9"/>
                <rect x="500" y="260" width="120" height="340" fill="#ffc107" opacity="0.9"/>
                <rect x="660" y="180" width="120" height="420" fill="#e91e63" opacity="0.9"/>
                <path d="M160 290l690-150v-30L160 260z" fill="#ffffff" opacity="0.1"/>
                <circle cx="200" cy="630" r="15" fill="#adb5bd"/>
                <circle cx="700" cy="630" r="15" fill="#adb5bd"/>
                <text x="250" y="660" font-size="22" fill="#ffffff" font-family="Arial, sans-serif">
                    Sistema de Gestión de Inventario
                </text>
            </svg>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
