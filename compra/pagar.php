<?php
include 'config.php';
include 'cone.php'; 
include 'carrito.php';
include 'cabecera.php';
?>

<?php
if ($_POST) {

    $total=0;
    $SID=session_id();

    foreach ($_SESSION['CARRITO']as $indice=>$producto){
        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);


    }
    $sentencia =$pdo->prepare("INSERT INTO `integradora2`.`ventas` 
           (`id_venta`, `id_producto`, `id_estatus`, `ve_fechaventa`, `ve_horaventa`, `ve_cantidadprod`, `ve_iva`, `ve_subtotal`, `ve_metodopago`, `descuento_aplicado`, `id_sucursal`) 
    VALUES (':id_venta', ':id_producto', ':id_estatus', NOW()   , NOW(), ':ve_cantidadprod', ':ve_iva', ':ve_subtotal', 've_metodopago', ':descuento_aplicado', ':id_sucursal');");
   $sentencia->bindParam(":id_venta",$SID);
   $sentencia->bindParam(":id_producto",$SID);
   $sentencia->bindParam(":id_estatus",$SID);
   $sentencia->bindParam(":ve_cantidadprod",$SID);
   $sentencia->bindParam(":ve_iva",$SID);
   $sentencia->bindParam(":ve_subtotal",$SID);
   $sentencia->bindParam(":ve_motodopago",$SID);
   $sentencia->bindParam(":descuento_aplicado",$SID);
   $sentencia->bindParam(":id_sucursal",$SID);
   
    $sentencia->execute();



    echo "<h3>".$total."</h3>";
}
?>


<?php include 'pie.php';?>