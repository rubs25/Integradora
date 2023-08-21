<?php
$host = "localhost"; // Cambia esto si tu base de datos está en un servidor diferente
$usuario = "root";
$contraseña = "Rubas2509";
$base_de_datos = "integradora4";

$mysqli = new mysqli($host, $usuario, $contraseña, $base_de_datos);

if ($mysqli->connect_error) {
    die("Error en la conexión: " . $mysqli->connect_error);
}
?>
