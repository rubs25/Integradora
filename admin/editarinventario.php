<?php
// Conexión a la base de datos
$conn = mysqli_connect('localhost', 'root', 'Rubas2509', 'integradora4') or die('Error al conectar con la base de datos: ' . mysqli_connect_error());

// Verificar si se ha enviado el formulario de edición
if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];

    // Actualizar la cantidad existente del producto en el inventario
    $query_actualizar = "UPDATE inventario SET pr_CantidadExistentes = ? WHERE id_inventario = ?";
    $stmt = mysqli_prepare($conn, $query_actualizar);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ii", $cantidad, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Redireccionar a la página de edición del producto después de la edición
        header("Location: inventario.php?id=" . $id);
        exit();
    } else {
        die('Error al preparar la consulta de actualización: ' . mysqli_error($conn));
    }
}

// Obtener el ID del producto a editar
$id = $_GET['id'];

// Obtener la información del producto a partir de su ID
$query_producto = "SELECT * FROM inventario WHERE id_inventario = ?";
$stmt_producto = mysqli_prepare($conn, $query_producto);

if ($stmt_producto) {
    mysqli_stmt_bind_param($stmt_producto, "i", $id);
    mysqli_stmt_execute($stmt_producto);
    $result_producto = mysqli_stmt_get_result($stmt_producto);

    if (mysqli_num_rows($result_producto) > 0) {
        $row_producto = mysqli_fetch_assoc($result_producto);
    } else {
        die('Producto no encontrado.');
    }
} else {
    die('Error al preparar la consulta de obtención de producto: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Encabezado y estilos -->
</head>
<body>
    <h1>Editar Producto</h1>

    <form action="editarinventario.php?id=<?php echo $id; ?>" method="POST" class="formulario">
        <input type="hidden" name="id" value="<?php echo $row_producto['id_inventario']; ?>">

        <label for="cantidad">Cantidad Existente:</label>
        <input type="number" id="cantidad" name="cantidad" value="<?php echo $row_producto['pr_CantidadExistentes']; ?>" required>

        <input type="submit" name="editar" value="Guardar Cambios">
    </form>
</body>
</html>