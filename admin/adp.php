<?php
include('conecction.php'); // Asegúrate de tener una conexión válida a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_producto = $_POST['id_producto'];
    $pr_CantidadExistentes = $_POST['pr_CantidadExistentes'];
    $id_sucursal = $_POST['id_sucursal'];

    // Validar y limpiar los datos si es necesario

    $query = "INSERT INTO inventario (id_producto, pr_CantidadExistentes, id_sucursal) 
              VALUES ('$id_producto', '$pr_CantidadExistentes', '$id_sucursal')";
    
    if (mysqli_query($conexion, $query)) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar datos: " . mysqli_error($conexion);
    }
}
header("Location: inventario.php");
exit();
?>