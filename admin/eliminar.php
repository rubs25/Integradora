<?php

include("conecction.php");

if(isset($_GET['idt_clientes'])) {
  $idt_clientes = $_GET['idt_clientes'];
  $query = "DELETE FROM t_clientes WHERE idt_clientes = $idt_clientes";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: clientes.php');
}

?>