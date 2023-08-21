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
    $iva = 16; // Coloca el valor correcto del IVA si es necesario
    $subtotal = $total; // El subtotal es igual al total si no tienes descuentos ni impuestos adicionales
    $metodoPago = 'PayPal'; // Establece el método de pago
    $descuentoAplicado = 0; // Si tienes descuentos, asigna el valor correcto

   /*$sentencia->bindParam(":ve_cantidadprod", $cantidadDeProductos);
    $sentencia->bindParam(":ve_iva", $iva);
    $sentencia->bindParam(":ve_subtotal", $subtotal);
    $sentencia->bindParam(":ve_metodopago", $metodoPago);
    $sentencia->bindParam(":descuento_aplicado", $descuentoAplicado);
    $sentencia->execute(); */
    $idVenta = $pdo->lastInsertId();
}
?>

<div class="jumbotron text-center">
    <h1 class="display-4"> ¡Paso Final! </h1>
    <h2>Ingrese sus datos para poder continuar con su compra</h2>
    <form action="#" method="POST" class="formulario">
    <div class="form-group">
        <label for="cl_nombre">Nombre:</label>
        <input type="text" id="cl_nombre" name="cl_nombre" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="cl_apellidomat">Apellido Paterno:</label>
        <input type="text" id="cl_apellidomat" name="cl_apellidomat" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="cl_apellidopa">Apellido Materno:</label>
        <input type="text" id="cl_apellidopa" name="cl_apellidopa" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="cl_numtelefono">Número de Teléfono:</label>
        <input type="tel" id="cl_numtelefono" name="cl_numtelefono" class="form-control">
    </div>

    <div class="form-group">
        <label for="cl_correo">Correo:</label>
        <input type="email" id="cl_correo" name="cl_correo" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="cl_direccion">Dirección:</label>
        <textarea id="cl_direccion" name="cl_direccion" class="form-control"></textarea>
    </div>
</form>

    <hr class="my-4">
    <p class="lead"> Estás a punto de pagar con PayPal la cantidad de:
        <h4>$<?php echo number_format($total, 2); ?> </h4>
        <script src="https://www.paypal.com/sdk/js?client-id=AZKhpgO0hUJQj9HEr91jwvCqFtBOnAsG2wEXangbCzjDery5DETaVA2X_Zw212mUQIdh3OOwIf3tb9KQ&currency=MXN"></script>
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