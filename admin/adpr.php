<?php
include("conecction.php");

// Establecer la conexión a la base de datos
$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_POST['adpr'])) {
    $nombre = isset($_POST['pr_Nombre']) ? $_POST['pr_Nombre'] : '';
    $precio = isset($_POST['pr_Precio_U_Venta']) ? $_POST['pr_Precio_U_Venta'] : '';

    // Sanitizar la entrada del usuario
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $precio = mysqli_real_escape_string($conexion, $precio);

    // Realizar la inserción en la base de datos
    $query = "INSERT INTO productos (pr_Nombre, pr_Precio_U_Venta)
              VALUES ('$nombre', '$precio')";

    $ejecutar = mysqli_query($conexion, $query);

    if (!$ejecutar) {
        die('Error en la consulta: ' . mysqli_error($conexion));
    }

    header('Location: productos.php');
    exit;
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
