<?php
include("conecction.php");


if (isset($_POST['add'])){
    $id =  $_POST['id'];
    $fecha =  $_POST['ve_fechaventa'];
    $hora = $_POST['ve_horaventa'];
    $cantidad =$_POST['ve_cantidadprod'];
    $iva =$_POST['ve_iva'];
    $sub =$_POST['ve_subtotal'];
    $metpago =$_POST['ve_metodopago'];
    $descapli =$_POST['descuento_aplicado'];

    $query = "INSERT INTO ventas (ve_fechaventa, ve_horaventa, ve_cantidadprod, ve_iva, ve_subtotal, ve_metodopago, descuento_aplicado)
          VALUES ('$fecha', '$hora', '$cantidad','$iva', '$sub', '$metpago', '$descapli',)";

$ejecutar = mysqli_query($conexion, $query);

if (!$ejecutar ) {
    die ('Error en query');
}

header ('Location: usuario.php');

}

?>