<?php
include("conecction.php");


if (isset($_POST['adp'])){
    $id =  $_POST['pr_id'];
    $nombre =  $_POST['pr_Nombre'];
    $marca = $_POST['pr_Marca'];
    $codigo =$_POST['pr_codigoBarras'];
    $precio =$_POST['pr_Precio_U_Venta'];
    $cant =$_POST['pr_CantidadExistentes'];
    $costo =$_POST['pr_Costo_envio'];
    $status = 1;
    $categoria = 1;
    $sucursal = 101;
   

    $query = "INSERT INTO productos (id_producto, id_estatus, id_categoria, pr_Nombre, pr_Marca,pr_codigoBarras,pr_Precio_U_Venta,pr_CantidadExistentes, pr_Costo_envio, id_sucursal)
          VALUES ('$id','$status', '$categoria',  '$nombre', '$marca','$codigo', '$precio', '$cant', '$costo',  $sucursal)";

$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar ) {
    die ('Error en query');
}

header ('Location: productos.php');

}

?>
