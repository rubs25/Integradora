<?php
include 'config.php';
include 'cone.php';
include 'carrito.php';
include 'cabecera.php';

// Obtén los detalles del cliente y la venta
$nombre = $_POST['nombre'];
$apellido_materno = $_POST['apellido_materno'];
$apellido_paterno = $_POST['apellido_paterno'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];

// Insertar en la tabla 'clientes'
$sqlCliente = "INSERT INTO clientes (nombre, apellido_materno, apellido_paterno, telefono, correo, direccion) VALUES (?, ?, ?, ?, ?, ?)";
$stmtCliente = $conn->prepare($sqlCliente);
$stmtCliente->bindParam(1, $nombre);
$stmtCliente->bindParam(2, $apellido_materno);
$stmtCliente->bindParam(3, $apellido_paterno);
$stmtCliente->bindParam(4, $telefono);
$stmtCliente->bindParam(5, $correo);
$stmtCliente->bindParam(6, $direccion);
$stmtCliente->execute();

$idCliente = $conn->lastInsertId(); // Obtener el ID del cliente insertado

// Insertar en la tabla 'ventas'
$sqlVenta = "INSERT INTO ventas (id_cliente, fecha, total, metodo_pago) VALUES (?, NOW(), ?, ?)";
$stmtVenta = $conn->prepare($sqlVenta);
$stmtVenta->bindParam(1, $idCliente);
$stmtVenta->bindParam(2, $subtotal);
$stmtVenta->bindParam(3, $metodoPago);
$stmtVenta->execute();

$idVenta = $conn->lastInsertId(); // Obtener el ID de la venta insertada


// Actualizar el inventario: restar cantidades compradas
foreach ($_SESSION['CARRITO'] as $producto) {
    // Resta la cantidad comprada al inventario
    // Actualiza el inventario en la base de datos
}

// Limpia el carrito después de la compra
$_SESSION['CARRITO'] = array();

// ... (código adicional de la página 'completado.php')

include 'pie.php';
?>

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
