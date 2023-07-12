<?php
include("conecction.php");

if (isset($_POST['alta'])){
    // Obtener valores del formulario
    $nombre = $_POST['nombre'];
    $apellidopaterno = isset($_POST['apellido_paterno']) ? $_POST['apellido_paterno'] : "";
    $apellidomaterno = isset($_POST['apellido_materno']) ? $_POST['apellido_materno'] : "";
    $dni = isset($_POST['dni']) ? $_POST['dni'] : "";
    $tel = isset($_POST['telefono']) ? $_POST['telefono'] : "";
    $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";

    // Insertar datos en la base de datos
    $query = "INSERT INTO t_clientes (nombre, apellido_paterno, apellido_materno, dni, telefono, correo, direccion)
              VALUES ('$nombre', '$apellidopaterno', '$apellidomaterno', '$dni', '$tel', '$correo', '$direccion')";
    
    $ejecutar = mysqli_query($conexion, $query);

    if (!$ejecutar) {
        die('Error en query: ' . mysqli_error($conexion));
    }

    header('Location: usuario.php');
    exit();
}

if (isset($_POST['editar'])){
    // Obtener el ID del cliente a editar
    $id = isset($_POST['id']) ? $_POST['id'] : "";

    // Resto del código para editar el cliente...
}
?>
z