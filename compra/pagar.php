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

<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

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

    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <!-- Set up a container element for the button -->
    <script>
      paypal.Buttons({
        
        client:{
            sandbox: 'AczIlYIWFj03wjqCgfJgDXhNxpuu0-Qp3Tn_0ucuhbRGbyLJuktHBinhEELqJiR6hpQba4QQEDceVOP4',
            productions: 'AczIlYIWFj03wjqCgfJgDXhNxpuu0-Qp3Tn_0ucuhbRGbyLJuktHBinhEELqJiR6hpQba4QQEDceVOP4'
        },
        createOrder() {
          return fetch("/my-server/create-paypal-order", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              cart: [
                {
                  sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
                  quantity: "YOUR_PRODUCT_QUANTITY",
                },
              ]
            })
          })
          .then((response) => response.json())
          .then((order) => order.id);
        }
      }).render('#paypal-button-container');
    </script>
  
      

<?php include 'pie.php';?>