$sql = "SELECT * FROM envios";
$resultado = mysqli_query($con, $sql);

$envios = [];

while($fila = mysqli_fetch_assoc($resultado)){
    $envios[] = $fila;
}

header('Content-Type: application/json');
echo json_encode($envios);
?>
