<?php
include("conecction.php");


if (isset($_POST['add'])){
    $fecha =  $_POST['fecha'];
    $hora = $_POST['horaventa'];
    $cliente =$_POST['cliente'];
    $cantidad =$_POST['cantidad'];
    $iva =$_POST['iva'];
    $sub =$_POST['subtotal'];
    $metpago =$_POST['metodo_pago'];
    $descapli =$_POST['descuento'];
    $total =$_POST['total'];

    $query = "INSERT INTO t_ventas (fecha, horaventa, cliente, cantpro, iva, subtotal, metpago, descapli, total)
          VALUES ('$fecha', '$hora', '$cliente', '$cantidad','$iva', '$sub', '$metpago', '$descapli', '$total')";

$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar ) {
    die ('Error en query');
}

header ('Location: usuario.php');

}

?>