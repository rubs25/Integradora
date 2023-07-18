<?php
include("../basedatos/conexion.php");


if (isset($_POST['registro_usuario'])){
    $nombre =  $_POST['nombre'];
    $gmail = $_POST['gmail'];
    $contrasena =$_POST['contrasena'];
    $confcontrasena =$_POST['confcontrasena'];


    $query = "INSERT INTO t_user (nombre, gmail, contrasena, rol)
          VALUES ('$nombre', '$gmail', '$contrasena', 'USER')";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar ) {
    echo '
     <script>
         alert("Usuario registrado exitosamente");
         window.location = "inicio.php";
         </script>
        ';
} else {
    echo '
     <script>
         alert("Error Usuario no registrado");
         window.location = "registro.php";
         </script>
        ';
}
    die ('Error en query');
}


//header ('Location:../index.php');

?>




