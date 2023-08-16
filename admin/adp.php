<?php
include("conecction.php"); // Corregido el nombre del archivo de conexión

if (isset($_POST['adp'])){

    $nombre = $_POST['pr_nombre'];
    $producto = $_POST['id_producto'];
    $cantexis = $_POST['pr_CantidadExistentes'];
    $sucursal = $_POST['id_sucursal'];
    $precioventa = $_POST['pr_Precio_U_Venta']; // Corregido el nombre de la variable
    $imagen = $_POST['img'];
    $cat = $_POST['id_categoria'];

    $query = "INSERT INTO inventario (pr_nombre, id_producto, pr_CantidadExistentes, id_sucursal, pr_Precio_U_Venta,img,id_categoria)
          VALUES ('$nombre', '$producto', '$cantexis', '$sucursal', '$precioventa','$imagen','$cat')";

    $ejecutar = mysqli_query($conexion, $query);

    if (!$ejecutar) {
        die('Error en query: ' . mysqli_error($conexion)); // Agregado manejo de error
    }

    header('Location: productos.php');
    exit; // Agregada la función exit para detener la ejecución después de la redirección
}
?>
