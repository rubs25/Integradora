<?php
session_start();
include("../basedatos/conexion.php");

global $usuario;

if (isset($_POST['inicio_usuario']))
    $usuario =  $_POST['usuario'];
    $contrasena =$_POST['contrasena'];

   $query = "SELECT * FROM t_user WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
   $validar_login = mysqli_query($conexion,$query);

    if (mysqli_num_rows($validar_login)>0) {
        $_SESSION['usuario']=$usuario;
        echo ' 
            <script>
                alert ("Iniciaste sesion correctamente");
                window.location = "bienvenida.php";
            </script>
        ';
        // header("location:./bienvenida.php");
        exit();
     } else {
        
        echo ' 
            <script>
                alert ("Usuario no correcto");
                window.location = "inicio.php";
            </script>
        ';
        exit();
        
    }   
?> 