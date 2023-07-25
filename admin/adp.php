<?php
include("conecction.php");


if (isset($_POST['adp'])){
    $id =  $_POST['id_producto'];
    $nombre =  $_POST['pr_Nombre'];
    $marca = $_POST['pr_Marca'];
    $codigo =$_POST['pr_codigoBarras'];
    $precio =$_POST['pr_Precio_U_Venta'];
    $cant =$_POST['pr_CantidadExistentes'];
    $costo =$_POST['pr_Costo_envio'];
   

    $query = "INSERT INTO productos (pr_Nombre, pr_Marca,pr_codigoBarras,pr_Precio_U_Venta,pr_CantidadExistentes, pr_Costo_envio)
          VALUES ( '$nombre', '$marca','$codigo', '$precio', '$cant', '$costo')";

$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar ) {
    die ('Error en query');
}

header ('Location: productos.php');

}

?>
