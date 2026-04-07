<?php
include("conexion.php");

// 1. Obtener número de guía por GET
$guia = $_GET['guia'] ?? '';

if ($guia == '') {
    die("❌ No se recibió el número de guía.");
}

// 2. Buscar el envío
$sql = "SELECT * FROM envios WHERE numero_guia = '$guia'";
$resultado = mysqli_query($con, $sql);
$envio = mysqli_fetch_assoc($resultado);

if (!$envio) {
    die("
        <div style='
            width: 50%;
            margin: 100px auto;
            padding: 20px;
            background: #ffe0e0;
            border-left: 5px solid #ff4d4d;
            border-radius: 10px;
            font-family: Poppins, sans-serif;
            text-align: center;
        '>
            <h2>❌ Este número de guía no existe</h2>
            <a href='formulario_rastreo.php' style='
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background: #0A74DA;
                color: white;
                text-decoration: none;
                border-radius: 8px;
            '>Volver</a>
        </div>
    ");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resultado del Rastreo</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background: #f0f2f5;
    }

    .contenedor {
        width: 90%;
        max-width: 600px;
        margin: 40px auto;
        background: #fff;
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        color: #333;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .item {
        margin: 15px 0;
        font-size: 16px;
    }

    .item span {
        font-weight: 600;
        color: #0A74DA;
    }

    .volver {
        display: block;
        text-align: center;
        margin-top: 25px;
        padding: 12px;
        background: #0A74DA;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        transition: 0.3s;
    }

    .volver:hover {
        background: #084a99;
    }

</style>
</head>

<body>

<div class="contenedor">
    <h1>📦 Rastreo de Envío</h1>

    <div class="item"><span>Número de guía:</span> <?php echo $envio['numero_guia']; ?></div>
    <div class="item"><span>Destinatario:</span> <?php echo $envio['nombre'] . " " . $envio['apellido']; ?></div>
    <div class="item"><span>Cédula:</span> <?php echo $envio['cedula']; ?></div>
    <div class="item"><span>Dirección:</span> <?php echo $envio['direccion']; ?></div>
    <div class="item"><span>Ciudad:</span> <?php echo $envio['ciudad']; ?></div>
    <div class="item"><span>Peso:</span> <?php echo $envio['peso']; ?> kg</div>
    <div class="item"><span>Descripción:</span> <?php echo $envio['descripcion']; ?></div>

    <a href="../inicio.php" class="volver">⬅ Volver al inicio</a>
</div>

</body>
</html>
