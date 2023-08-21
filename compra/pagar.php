<?php
include 'config.php';
include 'cone.php';
include 'carrito.php';
include 'cabecera.php';
$total = 0;
if ($_POST) {
    $total = 0;
    $SID = session_id();

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $total += ($producto['PRECIO'] * $producto['CANTIDAD']);
    }

    $cantidadDeProductos = count($_SESSION['CARRITO']);
    $iva = 16;
    $subtotal = $total;
    $metodoPago = 'PayPal';
    $total = 

    $idVenta = $pdo->lastInsertId();
}
?>
<div class="my-4">  
    <p class="lead"> Estás a punto de pagar con PayPal la cantidad de:
        <h4>$<?php echo number_format($subtotal, 2); ?> </h4>
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
                        value: <?php echo $subtotal; ?>
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
