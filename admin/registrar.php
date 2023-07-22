<?php
include("conecction.php");


if (isset($_POST['registrar'])){
    $usuario =  $_POST['usuario'];
    $tipo = $_POST['tipo'];
    $contrasena =$_POST['contrasena'];


    
    $query = "INSERT INTO t_user (usuario, tipo_usuario, contrasena)
          VALUES ('$usuario', '$tipo', '$contrasena')";

$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar ) {
    die ('Error en query');
}


header ('Location: usuario.php');

}
?>