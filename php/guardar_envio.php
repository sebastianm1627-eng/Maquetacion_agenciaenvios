<?php
include("conexion.php");

// 1. Obtener los valores del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$peso = $_POST['peso'];
$descripcion = $_POST['descripcion'];

// 2. Generar número de guía automáticamente
$consultaMax = mysqli_query($con, "SELECT MAX(id) AS max_id FROM envios");
$fila = mysqli_fetch_assoc($consultaMax);
$ultimoID = $fila['max_id'] ?? 0;

$nuevoID = $ultimoID + 1;
$numero_guia = "AG-" . str_pad($nuevoID, 5, "0", STR_PAD_LEFT);

// 3. Insertar en la BD
$sql = "INSERT INTO envios (numero_guia, nombre, apellido, cedula, direccion, ciudad, peso, descripcion) 
        VALUES ('$numero_guia', '$nombre', '$apellido', '$cedula', '$direccion', '$ciudad', '$peso', '$descripcion')";

if (mysqli_query($con, $sql)) {
    header("Location: ../php/confirmacion_envio.php?guia=$numero_guia");
    exit();
} else {
    echo "Error al guardar el envío: " . mysqli_error($con);
}
?>
