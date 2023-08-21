<?php
include("conecction.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM clientes WHERE id_cliente = $id";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Error al eliminar el cliente.");
  }
  header('Location: clientes.php');
}
?>