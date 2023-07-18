<?php
session_start();
include '../basedatos/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];

    // Consulta para verificar las credenciales de inicio de sesión
    $query = "SELECT * FROM t_user WHERE nombre = '$nombre' AND contrasena = '$contrasena'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) > 0) {
        
        $user = mysqli_fetch_assoc($result);
        
        $_SESSION['id'] = $user['id'];

        // Redireccionar al catálogo o a otra página según el tipo de usuario
        if ($user['nombre'] === 'root' || $user['nombre'] === 'root') {
        
            header("Location: ../index.php");
        
        } else {

            header("Location: ../registro.php");
        
        }
        exit();

    } else {
        
        $error_message = 'Credenciales inválidas. Por favor, intenta nuevamente.';
    }
}
?>


<!-- <?php
session_start();
include("../basedatos/conexion.php");


if (isset($_POST['inicio_usuario']))
    $nombre =  $_POST['nombre'];
    $contrasena =$_POST['contrasena'];

   $query = "SELECT * FROM t_user WHERE nombre = '$nombre' AND contrasena = '$contrasena'";
   $validar_login = mysqli_query($conexion,$query);

    
    if (mysqli_num_rows($validar_login)>0) {

        $_SESSION['id']=$nombre;
        header("location:../bienvenida.php");
        exit(); 
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
?> -->