<?php
include 'config.php';
include 'carrito.php';
include 'cabecera.php';
?>
<br>
<h3>Lista del carrito </h3>
<?php if(!empty($_SESSION['CARRITO'])) { ?>
<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th whidth="40%">Descripcion</th>
            <th whidth="15%" class="text-center">Cantidad</th>
            <th whidth="20%" class="text-center">Precio</th>
            <th whidth="20%" class="text-center">Total</th>
            <th whidth="5%">--</th>
        </tr>
        <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>
        <tr>
            <td whidth="40%"><?php echo $producto['NOMBRE']?></td>
            <td whidth="15%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
            <td whidth="20%" class="text-center"><?php echo $producto['PRECIO']?></td>
            <td whidth="20%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2);?></td>
            <td whidth="5%">

            <form action="" method="post">   
                <input type="hidden" name="id_inventario" id="id_inventario" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
            <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
            </form>
        
        </td>
        </tr> 
        <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); ?>
        <?php } ?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5">
            <form action="pagar.php" method="post">
                <div class="alert alert-success"> 
                <div class="form-group">
                    <label for="my-input">Correo de contacto:</label>
                    <input id="email" name="email" class="form-control" type="email" placeholder="Por favor escribe tu correo" required>

                </div>
                <small id="emailHelp" class="form-text text-muted">
                  Los productos se enviaran a este correo.
                </small>

                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder">
                    Proceder al pago >>
                </button>
            </form>

                
            </td>
        </tr>





    </tbody>
</table>
<?php }else {?>
    <div class="alert alert-success">
        No hay productos en el carrito...
</div>
<?php }?>
<?php include 'pie.php';?>