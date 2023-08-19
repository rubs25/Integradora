<?php
$host = "localhost"; // Cambia esto si tu base de datos está en un servidor diferente
$usuario = "root";
$contraseña = "Rubas2509";
$base_de_datos = "integradora2";

$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>
