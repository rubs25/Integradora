<?php
include("conecction.php");


if (isset($_POST['agregar'])){
    $nombre =  $_POST['nombre'];
    $cat = $_POST['categoria'];
    $color =$_POST['color'];
    $marca =$_POST['marca'];
    $codigo =$_POST['codigo'];
    $precioc =$_POST['precioc'];
    $preciov =$_POST['preciov'];
    $medida =$_POST['medida'];
    $empaque =$_POST['empaque'];
    $garantia =$_POST['garantia'];
    $cantd =$_POST['cantd'];
    $costo =$_POST['costo'];

    $query = "INSERT INTO t_productos (nombre, categoria, color, marca, codigo, precioc, preciov, medida, empaque, garantia, cantd, costo)
          VALUES ('$nombre', '$cat', '$color', '$marca','$codigo', '$precioc', '$preciov', '$medida', '$empaque', '$garantia', '$cantd', '$costo' )";

$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar ) {
    die ('Error en query');
}

header ('Location: productos.php');

}
?>
