<?php
include("conecction.php");


if (isset($_POST['alta'])){
    $nombre = $_POST['nombre'];
      /* $apellido_paterno = $_POST['apellido_paterno'];
      $apellido_materno = $_POST['apellido_materno']; */
      $tel = $_POST['telefono'];
      $correo = $_POST['correo'];
      $direccion = $_POST ['direccion'];


    
    $query = "INSERT INTO t_clientes (nombre, telefono, correo, direccion)
          VALUES ('$nombre', '$tel', '$correo', '$direccion')";

$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar ) {
    die ('Error en query');
}

header ('Location: clientes.php');

}
?>