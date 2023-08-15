<?php
include 'config.php';
include 'cone.php';
include 'carrito.php';
include 'cabecera.php';
?>

<?php
if ($_POST) {
    $total = 0;
    $SID = session_id();

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $total += ($producto['PRECIO'] * $producto['CANTIDAD']);
    }

    $total=$total-($total*0.16);
    $total=$total+($total*0.1);
    //$sentencia = $pdo->prepare("INSERT INTO `ventas` 
           //(`id_producto`, `id_estatus`, `ve_fechaventa`, `ve_horaventa`, `ve_cantidadprod`, `ve_iva`, `ve_subtotal`, `ve_metodopago`, `descuento_aplicado`, `id_sucursal`) 
    //VALUES (NULL, NULL, NOW(), NOW(), :ve_cantidadprod, :ve_iva, :ve_subtotal, :ve_metodopago, :descuento_aplicado, NULL);");

    // Asigna los valores adecuados a las variables
    $cantidadDeProductos = count($_SESSION['CARRITO']);
    $iva = 0; // Coloca el valor correcto del IVA si es necesario
    $subtotal = $total; // El subtotal es igual al total si no tienes descuentos ni impuestos adicionales
    $metodoPago = 'PayPal'; // Establece el método de pago
    $descuentoAplicado = 0; // Si tienes descuentos, asigna el valor correcto

   /*  $sentencia->bindParam(":ve_cantidadprod", $cantidadDeProductos);
    $sentencia->bindParam(":ve_iva", $iva);
    $sentencia->bindParam(":ve_subtotal", $subtotal);
    $sentencia->bindParam(":ve_metodopago", $metodoPago);
    $sentencia->bindParam(":descuento_aplicado", $descuentoAplicado);

    $sentencia->execute(); */
    $idVenta = $pdo->lastInsertId();
}
?>

<script src="https://www.paypal.com/sdk/js?client-id=AVEkyraA4M6-d7zKyMzMe7jzgc3r0AtdiY8gOlEHw8nAYqAmO8cOo5JMMafxuSYrw5SQ3DSSLoc4nFoT&currency=MXN"></script>

<div class="jumbotron text-center">
    <h1 class="display-4"> ¡Paso Final! </h1>
    <hr class="my-4">
    <p class="lead"> Estás a punto de pagar con PayPal la cantidad de:
        <h4>$<?php echo number_format($total, 2); ?> </h4>

        <div id="paypal-button-container"></div>
    </p>

    <p>Su factura estará disponible después del pago si así lo desea<br/>
        <strong>(Para aclaraciones: motortoys@gmail.com)</strong>
    </p>

</div>

<script>
    paypal.Buttons({
        style: {
            color: 'silver',
            shape: 'pill',
            label: 'pay'
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo $total; ?>'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            actions.order.capture().then(function(details) {
                // Lógica adicional después de realizar el pago

                // Redirige a la página 'completado.php'
                window.location.href = "completado.php";
            });
        },
        onCancel: function(data) {
            alert("Su pago ha sido cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');
</script>

<?php include 'pie.php';?>