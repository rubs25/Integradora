<?php
include("conecction.php");


if (isset($_POST['alta'])){
    $nombre = $_POST['nombre'];
      $apellido_paterno = $_POST['apellido-paterno'];
      $apellido_materno = $_POST['apellido-materno']; 
      $tel = $_POST['telefono'];
      $correo = $_POST['correo'];
      $direccion = $_POST ['direccion'];


    
    $query = "INSERT INTO t_clientes (nombre,apellido-paterno, apellido-materno, telefono, correo, direccion)
          VALUES ('$nombre','$apellido_paterno','$apellido_materno', '$tel', '$correo', '$direccion')";

$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar ) {
    die ('Error en query');
}

header ('Location: clientes.php');

}
?>