<?php
// Conexión a la base de datos
$conn = mysqli_connect('localhost', 'root', '123456', 'integradora') or die('Error al conectar con la base de datos: ' . mysqli_connect_error());

// Obtener el ID del producto a eliminar
$id = $_GET['id'];

// Realizar la eliminación del producto
$query_eliminar = "DELETE FROM inventario WHERE id_inventario = ?";
$stmt = mysqli_prepare($conn, $query_eliminar);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redireccionar de regreso a la página de inventario después de la eliminación
    header("Location: inventario.php");
    exit();
} else {
    die('Error al preparar la consulta de eliminación: ' . mysqli_error($conn));
}
?>