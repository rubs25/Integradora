<?php
// config.php

// Datos de conexión a la base de datos
// Define las constantes de conexión
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Rubas2509');
define('DB_DATABASE', 'integradora4');

// Establecer conexión
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Error al conectar con la base de datos: ' . mysqli_connect_error());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y limpiar el ID del producto
    if (isset($_POST['delete_id']) && is_numeric($_POST['delete_id'])) {
        $id = mysqli_real_escape_string($conn, $_POST['delete_id']);

        // Consulta SQL preparada para eliminar el producto
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            echo "El producto se eliminó correctamente.";
        } else {
            echo "Error al eliminar el producto: " . mysqli_error($conn);
        }

        // Cerrar la declaración preparada
        mysqli_stmt_close($stmt);
    } else {
        echo "ID de producto no válido.";
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>