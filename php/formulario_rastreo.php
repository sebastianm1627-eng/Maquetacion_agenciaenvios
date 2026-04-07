<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastrear Envío</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f0f2f5;
        }

        .container {
            width: 90%;
            max-width: 400px;
            margin: 80px auto;
            background: #fff;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        input {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            width: 95%;
            padding: 12px;
            background: #0A74DA;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #084a99;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>🔍 Rastrear Envío</h2>

    <form action="procesar_rastreo.php" method="GET">
        <input type="text" name="guia" placeholder="Ej: AG-00008" required>
        <button type="submit">Buscar</button>
    </form>

</div>

</body>
</html>
