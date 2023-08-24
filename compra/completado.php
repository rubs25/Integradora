<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Compra</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: linear-gradient(to bottom, #FFD700, #FF8C00);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            max-width: 450px;
        }

        h1 {
            color: #FF4500;
            font-size: 32px;
            margin-bottom: 20px;
        }

        p {
            color: #333;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            padding: 12px 28px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-primary {
            background-color: #FF4500;
            color: #fff;
            margin-right: 15px;
        }

        .btn-secondary {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Gracias por tu compra!</h1>
        <p>Tu factura está lista para ser descargada.</p>
        <strong>Descarga tu factura:</strong>
        <a class="btn btn-primary" href="../admin/factura.php" role="button">¡Descargar Ahora!</a>
        <a class="btn btn-secondary" href="../compra/catalogo.php" role="button">Volver</a>
    </div>
</body>
</html>
