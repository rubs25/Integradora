<?php
include 'config.php';
include 'cone.php';
include 'carrito.php';
include 'cabecera.php';
include 'pagar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btnAccion'])) {
        $accion = $_POST['btnAccion'];
        if ($accion === 'incrementar') {
            // ... Código existente para incrementar la cantidad en el carrito ...
        } elseif ($accion === 'decrementar') {
            // ... Código existente para decrementar la cantidad en el carrito ...
        }
    }
}

$servername = "localhost";
$username = "root";
$password = "Rubas2509";
$dbname = "integradora4";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnAccion']) && $_POST['btnAccion'] === 'proceder') {
    $nombre = $_POST['nombre'];
    $apellido_materno = $_POST['apellido_materno'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];

    // Realiza la inserción en la tabla "clientes"
    try {
        $sql = "INSERT INTO clientes (cl_nombre, cl_apellidomat, cl_apellidopa, cl_numtelefono, cl_correo, cl_direccion) 
        VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $apellido_materno);
        $stmt->bindParam(3, $apellido_paterno);
        $stmt->bindParam(4, $telefono);
        $stmt->bindParam(5, $correo);
        $stmt->bindParam(6, $direccion);
        $stmt->execute();

        // Obtener el ID del cliente recién insertado
        $clienteId = $conn->lastInsertId();
        $_SESSION['cliente_id']=$clienteId;
        // Calcular los valores para la inserción en la tabla "ventas"
        $total = 0;
        foreach ($_SESSION['CARRITO'] as $producto) {
            $total += ($producto['PRECIO'] * $producto['CANTIDAD']);
        }
        $subtotal = $total / 1.16;
        $iva = ($total / 1.16) * 0.16;
        $metodoPago = 'PayPal';

        // Inserción de la venta en la tabla "ventas"
     // Inserción de la venta en la tabla "ventas"
$sqlVenta = "INSERT INTO ventas (id_cliente, fecha_venta, hora_venta, total, id_sucursal, id_producto) 
VALUES (?, CURDATE(), CURTIME(), ?, ?, ?)";

$stmtVenta = $conn->prepare($sqlVenta);
$stmtVenta->bindParam(1, $clienteId);
$stmtVenta->bindParam(2, $total);
// Asigna el ID de la sucursal según tus necesidades
$idSucursal = 1;  // Esto es un ejemplo, reemplázalo con el valor correcto
$stmtVenta->bindParam(3, $idSucursal);

// Realiza una inserción por cada producto en el carrito
foreach ($_SESSION['CARRITO'] as $producto) {
    $productoId = $producto['ID'];
    $stmtVenta->bindParam(4, $productoId);
    $stmtVenta->execute();
}

        //hacer un update del carrito
        
        // Actualiza las cantidades de productos en el inventario
        foreach ($_SESSION['CARRITO'] as $producto) {
            $productoId = $producto['ID'];
            $cantidadComprada = $producto['CANTIDAD'];

            // Actualiza la cantidad en la tabla "inventario"
            $sqlUpdateInventario = "UPDATE inventario SET pr_CantidadExistentes = pr_CantidadExistentes - ? WHERE id_producto = ?";
            $stmtUpdateInventario = $conn->prepare($sqlUpdateInventario);
            $stmtUpdateInventario->bindParam(1, $cantidadComprada);
            $stmtUpdateInventario->bindParam(2, $productoId);
            $stmtUpdateInventario->execute();
        }

        // Limpia el carrito después de la compra exitosa
        unset($_SESSION['CARRITO']);

        // Resto del código...
    } catch (PDOException $e) {
        echo 'Error al realizar la consulta: ' . $e->getMessage();
    }
}
?>

<!-- Resto del código de la página... -->
