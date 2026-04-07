<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel de Agencia de envíos</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a2d9d6bd64.js" crossorigin="anonymous"></script>

    <style>
        body {
            margin: 0;
            background: #f5f7fa;
            font-family: 'Poppins', sans-serif;
        }

        /* HEADER */
        header {
            width: 100%;
            background: #ffffff;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .logo {
            height: 48px;
        }

        nav a {
            margin-left: 25px;
            font-weight: 600;
            color: #333;
            text-decoration: none;
            transition: 0.2s;
        }

        nav a:hover {
            color: #0A74DA;
        }

        /* CONTENEDOR PRINCIPAL */
        .container {
            max-width: 900px;
            margin: 60px auto;
            text-align: center;
        }

        .title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #222;
        }

        .subtitle {
            color: #666;
            margin-bottom: 40px;
            font-size: 1.1rem;
        }

        /* GRID DE OPCIONES */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .menu-card {
            padding: 30px;
            border-radius: 18px;
            background: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #fff;
            font-weight: 600;
            font-size: 1.2rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            transition: 0.3s;
        }

        .menu-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.18);
        }

        .azul { background: #0A74DA; }
        .verde { background: #28a745; }
        .morado { background: #6f42c1; }
        .rojo { background: #dc3545; }

        .menu-card i {
            font-size: 45px;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
    <header>
        <img src="img/logo.png" class="logo" alt="Logo" />
        <nav>
            <a href="inicio.php">Inicio</a>
            <a href="php/ver_envios.php">Envíos</a>
            <a href="login.html">Salir</a>
        </nav>
    </header>

    <div class="container">
        <h1 class="title">Bienvenido al Panel de Envíos</h1>
        <p class="subtitle">Selecciona una opción para continuar</p>

        <div class="menu-grid">
            <a href="php/form_envio.php" class="menu-card azul">
                <i class="fas fa-box"></i>
                Registrar Envío
            </a>

            <a href="php/ver_envios.php" class="menu-card verde">
                <i class="fas fa-list"></i>
                Ver Envíos
            </a>

            <!-- 🔍 Nuevo botón de rastreo de envíos -->
            <a href="php/formulario_rastreo.php" class="menu-card morado">
                <i class="fas fa-search-location"></i>
                Rastrear Envío
            </a>

            <a href="register.html" class="menu-card morado">
                <i class="fas fa-user-plus"></i>
                Crear Usuario
            </a>

            <a href="login.html" class="menu-card rojo">
                <i class="fas fa-sign-out-alt"></i>
                Cerrar Sesión

                <a href="php/gestionar_estado.php" class="menu-card azul">
                <i class="fas fa-exchange-alt"></i>
                Gestionar Estado
</a>
            </a>
        </div>
    </div>
</body>
</html>
