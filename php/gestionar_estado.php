<?php
include 'conexion.php';

// Verificar conexión
if (!$con) {
    die("❌ Error al conectar con la BD.");
}

$envio = null;
$mensaje = "";
$error = "";

// Buscar envío
if (isset($_POST['buscar'])) {
    $numero_guia = $_POST['numero_guia'];

    $sql = "SELECT * FROM envios WHERE numero_guia = '$numero_guia' LIMIT 1";
    $resultado = mysqli_query($con, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $envio = mysqli_fetch_assoc($resultado);
    } else {
        $error = "❌ No se encontró un envío con ese número de guía.";
    }
}

// Actualizar estado
if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nuevo_estado = $_POST['estado'];

    $sql = "UPDATE envios SET descripcion = '$nuevo_estado' WHERE id = '$id'";

    if (mysqli_query($con, $sql)) {
        $mensaje = "✅ Estado actualizado correctamente.";

        // Recargar datos actualizados
        $sql2 = "SELECT * FROM envios WHERE id = '$id' LIMIT 1";
        $resultado2 = mysqli_query($con, $sql2);
        $envio = mysqli_fetch_assoc($resultado2);

    } else {
        $error = "❌ Error al actualizar el estado: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Estado del Envío</title>
    <link rel="stylesheet" href="../css/gestionar_estado.css">
</head>
<body>

<!-- 🟣 CONTENEDOR CENTRADO -->
<div class="container">

    <h2>Gestionar Estado del Envío</h2>

    <!-- Mensajes -->
    <?php if ($mensaje): ?>
        <div class="mensaje"><?= $mensaje ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <!-- Formulario de búsqueda -->
    <form method="POST">
        <label>Número de guía:</label>
        <input type="text" name="numero_guia" required>
        <button type="submit" name="buscar">Buscar</button>
    </form>

    <?php if ($envio): ?>

        <h3>Datos del envío</h3>

        <!-- Tarjeta de datos -->
        <div class="card">
            <p><strong>Guía:</strong> <?= $envio['numero_guia'] ?></p>
            <p><strong>Nombre:</strong> <?= $envio['nombre'] ?></p>
            <p><strong>Apellido:</strong> <?= $envio['apellido'] ?></p>
            <p><strong>Estado actual:</strong> <?= $envio['descripcion'] ?></p>
        </div>

        <!-- Formulario actualizar estado -->
        <h3>Actualizar estado</h3>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $envio['id'] ?>">

            <label>Nuevo estado:</label>
            <select name="estado" required>
                <option value="En Bodega">En Bodega</option>
                <option value="En Ruta">En Ruta</option>
                <option value="Entregado">Entregado</option>
                <option value="Retrasado">Retrasado</option>
            </select>

            <button type="submit" name="actualizar">Actualizar</button>
        </form>

    <?php endif; ?>
    <a href="../inicio.php" class="btn-volver">⬅ Volver al menú</a>


</div> <!-- FIN CONTAINER -->

</body>
</html>
