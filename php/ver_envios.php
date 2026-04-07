<?php
include("conexion.php");

$sql = "SELECT * FROM envios ORDER BY id DESC";
$resultado = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Envíos</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f0f2f5;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
            background: #fff;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background: #0A74DA;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f1f7ff;
        }

        .volver {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
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

<div class="container">
    <h1>📦 Envíos Registrados</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>N° Guía</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cédula</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Peso (kg)</th>
                <th>Descripción</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?php echo $fila['id']; ?></td>
                    <td><?php echo $fila['numero_guia']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['apellido']; ?></td>
                    <td><?php echo $fila['cedula']; ?></td>
                    <td><?php echo $fila['direccion']; ?></td>
                    <td><?php echo $fila['ciudad']; ?></td>
                    <td><?php echo $fila['peso']; ?></td>
                    <td><?php echo $fila['descripcion']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="../inicio.php" class="volver">⬅ Volver al panel</a>
</div>

</body>
</html>
