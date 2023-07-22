<?php

include("conecction.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM t_user WHERE id_user = $id";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: usuario.php');
}

?>