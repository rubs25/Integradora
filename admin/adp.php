<?php
include("conecction.php");


if (isset($_POST['adp'])){

    $nombre =  $_POST['pr_nombre'];
    $producto = $_POST['id_producto'];
    $cantexis =$_POST['pr_CantidadExistentes'];
    $sucursal =$_POST['id_sucursal'];
    $preioventa =$_POST['pr_Precio_U_Venta'];
   

    $query = "INSERT INTO inventario (pr_nombre, id_producto,pr_CantidadExistentes, id_sucursal,pr_Precio_U_Venta)
          VALUES ('$nombre', '$producto',  '$cantexis', '$sucursal','$preioventa')";

$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar ) {
    die ('Error en query');
}

header ('Location: productos.php');

}

?>
