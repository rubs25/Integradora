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
    if (isset($_POST['id_producto'])) { // Comprobar si id_producto existe
        $id_producto = $_POST['id_producto'];
        $_SESSION['id_producto'] = $id_producto; // Añadir el id_producto a la sesión
    }
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
       $total = 0;
     foreach ($_SESSION['CARRITO'] as $producto) {
    $total += ($producto['PRECIO'] * $producto['CANTIDAD']);
    }
    $subtotal = $total / 1.16;
    $iva = ($total / 1.16) * 0.16;
    $metodoPago = 'PayPal';
    
$sqlVenta = "INSERT INTO ventas (id_cliente, fecha_venta, hora_venta, total, id_sucursal) 
VALUES (?, CURDATE(), CURTIME(), ?, ?)";
$stmtVenta = $conn->prepare($sqlVenta);
$stmtVenta->bindParam(1, $clienteId);
$stmtVenta->bindParam(2, $total);
$idSucursal = 1;  
$stmtVenta->bindParam(3, $idSucursal);
$stmtVenta->execute();

// Obtener el ID de la venta recién insertada
$ventaId = $conn->lastInsertId();

// Inserción de los productos comprados en la tabla "ventas_detalle"
foreach ($_SESSION['CARRITO'] as $producto) {
    $productoId = $producto['ID'];
    $cantidadComprada = $producto['CANTIDAD'];

    // Inserta el producto en la tabla "ventas_detalle"
    $sqlProductoVenta = "INSERT INTO ventas_detalle (id_venta, id_producto, cantidad) 
    VALUES (?, ?, ?)";
    $stmtProductoVenta = $conn->prepare($sqlProductoVenta);
    $stmtProductoVenta->bindParam(1, $ventaId); // Usar el ID de la venta
    $stmtProductoVenta->bindParam(2, $productoId);
    $stmtProductoVenta->bindParam(3, $cantidadComprada);
    $stmtProductoVenta->execute();

    // Actualiza la cantidad en la tabla "inventario"
    $sqlUpdateInventario = "UPDATE inventario SET pr_CantidadExistentes = pr_CantidadExistentes - ? WHERE id_producto = ?";
    $stmtUpdateInventario = $conn->prepare($sqlUpdateInventario);
    $stmtUpdateInventario->bindParam(1, $cantidadComprada);
    $stmtUpdateInventario->bindParam(2, $productoId);
    $stmtUpdateInventario->execute();
}

unset($_SESSION['CARRITO']);

// Resto del código...


unset($_SESSION['CARRITO']);

        // Resto del código...
    } catch (PDOException $e) {
        echo 'Error al realizar la consulta: ' . $e->getMessage();
    }
}
?>