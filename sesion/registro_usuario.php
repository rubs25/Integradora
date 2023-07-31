<?php
include("../basedatos/conexion.php");


if (isset($_POST['registro_usuario'])){
    $usuario =  $_POST['usuario'];
    $contrasena =$_POST['contrasena'];
    $confcontrasena =$_POST['confcontrasena'];
    $tipo = 2; //usuario de tipo cliente

    $query = "INSERT INTO t_user (usuario, tipo_usuario, contrasena)
    VALUES ('$usuario', '$tipo', '$contrasena')";


$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar ) {
    $_SESSION['usuario']=$usuario;
    echo '
     <script>
         alert("Usuario registrado exitosamente");
         window.location = "../index.php";
         </script>
        ';
} else {
    echo '
     <script>
         alert("Usuario no registrado");
         window.location = "registro.php";
         </script>
        ';
}
    die ('Error en query');
}

?>




