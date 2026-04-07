<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "agencia_envios";

$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("❌ Error en la conexión: " . mysqli_connect_error());
}
?>

