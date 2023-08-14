<?php

include("conecction.php");

if(isset($_GET['id_venta'])) {
  $id = $_GET['id_venta'];
  $query = "DELETE FROM ventas WHERE id_venta = $id";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: ventas.php');
}

?>