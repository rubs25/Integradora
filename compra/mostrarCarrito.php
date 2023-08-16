<?php
include 'config.php';
include 'carrito.php';
include 'cabecera.php';
?>
<br>
<h3>Lista del carrito</h3>
<?php if(!empty($_SESSION['CARRITO'])) { ?>
<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%">Descripción</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">Eliminar</th>
        </tr>
        <?php $subtotal=0; ?>
        <?php $descuentoTotal=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>
        <tr>
            <td width="40%"><?php echo $producto['NOMBRE']?></td>
            <td width="15%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
            <td width="20%" class="text-center"><?php echo $producto['PRECIO']?></td>
            <?php $subtotalProducto = $producto['PRECIO'] * $producto['CANTIDAD']; ?>
            <td width="20%" class="text-center"><?php echo number_format($subtotalProducto,2);?></td>
            <td width="5%">
                <form action="" method="post">   
                    <input type="hidden" name="id_inventario" id="id_inventario" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                    <button class="btn btn-outline-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                </form>
            </td>
        </tr> 
        <?php $subtotal += $subtotalProducto; ?>
        <?php $descuento = $subtotalProducto * 0.16; ?>
        <?php $descuentoTotal += $descuento; ?>
        <?php } ?>
        <tr>
            <td colspan="3" align="right"><h3>Subtotal</h3></td>
            <td align="right"><h3>$<?php echo number_format($subtotal,2);?></h3></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3" align="right"><h3>Descuento</h3></td>
            <td align="right"><h3>$<?php echo number_format($descuentoTotal,2);?></h3></td>
            <td></td>
        </tr>
        <?php $subtotalDescuento = $subtotal - $descuentoTotal; ?>
        <tr>
            <td colspan="3" align="right"><h3>IVA</h3></td>
            <td align="right"><h3>$<?php echo number_format($subtotalDescuento * 0.1,2);?></h3></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($subtotalDescuento * 1.1, 2);?></h3></td>
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
                            Los productos se enviarán a este correo.
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
<?php } else { ?>
    <div class="alert alert-success">
        No hay productos en el carrito...
    </div>
<?php } ?>
<?php include 'pie.php';?>