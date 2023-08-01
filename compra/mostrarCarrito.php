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
            <td whidth="5%"><button class="btn btn-danger" type="button">Eliminar</button></td>
        </tr> 
        <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); ?>
        <?php } ?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>
    </tbody>
</table>
<?php }else {?>
    <div class="alert alert-success">
        No hay productos en el carrito...
</div>
<?php }?>
<?php include 'pie.php';?>