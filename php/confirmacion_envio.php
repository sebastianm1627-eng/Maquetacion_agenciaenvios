<?php
$guia = $_GET['guia'] ?? 'No encontrado';
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Envío registrado</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f2f2f2;
    text-align: center;
    padding-top: 80px;
}
.caja {
    background: #fff;
    padding: 40px;
    border-radius: 15px;
    width: 60%;
    margin: auto;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}
.guia {
    font-size: 1.8rem;
    font-weight: bold;
    color: #0A74DA;
}
</style>
</head>
<body>

<div class="caja">
    <h2>✅ Envío registrado con éxito</h2>
    <p>Tu número de guía es:</p>
    <p class="guia"><?php echo $guia; ?></p>

    <a href="../inicio.php" 
   style="display:inline-block; margin-top:20px; padding:10px 20px; 
   background:#0A74DA; color:white; border-radius:8px; text-decoration:none;">
   Volver al Inicio
</a>


</div>

</body>
</html>
