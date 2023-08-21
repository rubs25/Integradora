<?php
include("../basedatos/conexion.php");
// Comenzar la sesión si no ha sido iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el carrito está definido y no está vacío
if (isset($_SESSION['CARRITO']) && count($_SESSION['CARRITO']) > 0) {
    // Conexión a la base de datos
    // $conexion = new mysqli('localhost', 'root', 'Rubas2509', 'integradora2');

    // // Verificar la conexión
    // if ($conexion->connect_error) {
    //     die("Conexión fallida: " . $conexion->connect_error);
    // }

    $total = 0;
    $fechaActual = date("Y-m-d");
    $horaActual = date("h:i:s");
    // Recorrer todos los productos en el carrito
    foreach ($_SESSION['CARRITO'] as $producto) {
        
        //registrar venta a la base de datos
        //idproducto va ser igual a id_inventario
        //los datos se deben volver a calcular
        //por ahora el id de sucursal va ser fija
        //despues agregar id_sucursal al carrito por producto/
        $total = $producto['CANTIDAD'] * $producto['PRECIO'];
        // Obtener la cantidad existente del producto en el inventario
        $stmt = $conexion->prepare("SELECT pr_CantidadExistentes FROM inventario WHERE id_inventario = ?");
        $stmt->bind_param("i", $producto['ID']);
        $stmt->execute();
        $stmt->bind_result($cantidadExistente);
        $stmt->fetch();
        $stmt->close();

        // Calcular la nueva cantidad existente
        $nuevaCantidadExistente = $cantidadExistente - $producto['CANTIDAD'];

        // Actualizar la cantidad existente del producto en el inventario
        $stmt = $conexion->prepare("UPDATE inventario SET pr_CantidadExistentes = ? WHERE id_inventario = ?");
        $stmt->bind_param("ii", $nuevaCantidadExistente, $producto['ID']);
        $stmt->execute();
        $stmt->close();
    }

    //registrar venta
    $id_cliente = 1;
    $sucursal = 101;
    $sql = "INSERT INTO ventas (id_cliente, fecha_venta ,hora_venta ,total, id_sucursal) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("issdi", $id_cliente, $fechaActual, $horaActual, $total, $sucursal);
    // $stmt->bindParam(1, $id_cliente);
    // $stmt->bindParam(2, $fechaActual);
    // $stmt->bindParam(3, $horaActual);
    // $stmt->bindParam(4, $total);
    // $stmt->bindParam(5, 101);
    $stmt->execute();

    // Cerrar la conexión
    $conexion->close();

    // Destruir la sesión del carrito
    unset($_SESSION['CARRITO']);
}
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
