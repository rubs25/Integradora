<?php
// config.php

// Datos de conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = 'Rubas2509';
$database = 'integradora4';

// Establecer conexión
$conn = mysqli_connect($host, $user, $password, $database) or die('Error al conectar con la base de datos: ' . mysqli_connect_error());

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores enviados por el formulario
    $id = $_POST['id'];
    $newPrice = $_POST['new_price'];

    // Actualizar el precio del producto en la base de datos
    $sql = "UPDATE products SET price='$newPrice' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "El producto se ha actualizado correctamente.";
        // Redirigir a gestion_productos.php después de la actualización
        header("Location: productos.php");
        exit(); // Terminar la ejecución del script después de la redirección
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>