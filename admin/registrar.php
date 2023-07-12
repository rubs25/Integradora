<?php
include("conecction.php");


if (isset($_POST['registrar'])){
    $nombre =  $_POST['nombre'];
    $gmail = $_POST['gmail'];
    $contrasena =$_POST['contrasena'];


    
    $query = "INSERT INTO t_user (nombre, gmail, contrasena, rol)
          VALUES ('$nombre', '$gmail', '$contrasena', 'USER')";

$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar ) {
    die ('Error en query');
}

header ('Location: usuario.php');

}
?>