<?php
include("conecction.php");

if (isset($_POST['registrar'])) {
    $contrasena = $_POST['contrasena'];
    $usuario = $_POST['usuario'];
    $tipo = $_POST['tipo_usuario'];

    // Utilizar consulta preparada
    $query = "INSERT INTO t_user (contrasena, usuario, tipo_usuario)
              VALUES (1$contrasena', '$usuario', '$tipo')";
              
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "sss", $contrasena, $usuario, $tipo);
    
    $ejecutar = mysqli_stmt_execute($stmt);

    if (!$ejecutar) {
        die('Error en query');
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    header('Location: usuario.php');
}
?>
