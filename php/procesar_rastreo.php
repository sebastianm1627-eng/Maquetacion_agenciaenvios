<?php
include("conexion.php");

// 1. Recibir el número de guía enviado por GET
$guia = $_GET['guia'] ?? '';

if ($guia == '') {
    die("❌ No se recibió ningún número de guía.");
}

// 2. Buscar el envío en la BD
$sql = "SELECT * FROM envios WHERE numero_guia = '$guia'";
$resultado = mysqli_query($con, $sql);

// 3. Validar si existe
if (mysqli_num_rows($resultado) > 0) {
    header("Location: resultado_rastreo.php?guia=$guia");
    exit();
} else {
    echo "
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
        <h2>❌ Número de guía no encontrado</h2>
        <p>Verifica que esté escrito así: <b>AG-00008</b></p>
        <a href='formulario_rastreo.php' style='
            display: block;
            margin-top: 20px;
            padding: 10px;
            background: #0A74DA;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        '>Volver a intentar</a>
    </div>
    ";
}
?>
