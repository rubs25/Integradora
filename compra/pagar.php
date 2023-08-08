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
    $sentencia =$pdo->prepare("INSERT INTO `ventas` 
           (`id_venta`, `ve_fechaventa`, `ve_horaventa`, `ve_cantidadprod`, `ve_iva`, `ve_subtotal`, `ve_metodopago`, `descuento_aplicado`) 
    VALUES (NULL , NOW()   , NOW(), ':ve_cantidadprod', ':ve_iva', ':ve_subtotal', 've_metodopago', ':descuento_aplicado');");
    
   $sentencia->bindParam(":id_venta",$SID);
   $sentencia->bindParam(":ve_cantidadprod",$SID);
   $sentencia->bindParam(":ve_iva",$SID);
   $sentencia->bindParam(":ve_subtotal",$SID);
   $sentencia->bindParam(":ve_metodopago",$SID);
   $sentencia->bindParam(":descuento_aplicado",$SID);
    //$sentencia->execute();
    $idVenta=$pdo->lastInsertId();




    //echo "<h3>".$total."</h3>";
}
?>

<script src="https://www.paypal.com/sdk/js?client-id=AVEkyraA4M6-d7zKyMzMe7jzgc3r0AtdiY8gOlEHw8nAYqAmO8cOo5JMMafxuSYrw5SQ3DSSLoc4nFoT&currency=MXN"></script>
<div class="jumbotron text-center">
    <h1 class="display-4"> ¡Paso Final! </h1>
    <hr class="my-4">
    <p class="lead"> Estas a punto de pagar con Pay Pal la cantidad de: 
        <h4>$<?php echo number_format($total,2);  ?> </h4>
         <div id="paypal-button-container"></div>
    </p>
        <p>Su factura estara disponible despues del pago si es que asi lo desea<br/>
        <strong> (Para aclaraciones :motortoys@gmail.com) </strong>
        </p>
</div>

<script>
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },

            createOrder: function(data, actions) {
                // Obtener el total de la venta desde la URL
                var urlParams = new URLSearchParams(window.location.search);
                var totalVenta = urlParams.get('total_venta');

                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: totalVenta
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                console.log("Pago aprobado");
                actions.order.capture().then(function(details) {
                    // Mostrar mensaje de "Compra exitosa"
                    alert("Su compra fue exitosa");
                    // Redirigir al usuario al archivo "index.php"
                    window.location.href = "catalogo.php";
                });
            },

            onCancel: function(data, actions) {
                alert("Su pago a sido cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>
    <div class="flex">
        <a href="catalogo.php" class="btn">Salir</a>
    </div>


<?php include 'pie.php';?>