<?php
session_start();
include("../basedatos/conexion.php");


if (isset($_POST['inicio_usuario']))
    $nombre =  $_POST['nombre'];
    $contrasena =$_POST['contrasena'];

   $query = "SELECT * FROM t_user WHERE nombre = '$nombre' AND contrasena = '$contrasena'";
   $validar_login = mysqli_query($conexion,$query);

    if (mysqli_num_rows($validar_login)>0) {

        $_SESSION['usuario']=$nombre;
        /* header("location:../bienvenida.php");
        exit(); */
        echo ' 
            <script>
                alert ("Iniciaste sesion correctamente");
                window.location = "../index.php";
            </script>
        ';
        exit();
    } else {
        echo ' 
            <script>
                alert ("Usuario no existe");
                window.location = "inicio.php";
            </script>
        ';
        exit();
    }  
?>