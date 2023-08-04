<?php
include 'config.php';
include 'cone.php'; 
include 'carrito.php';
include 'cabecera.php';

?>
  <br>
  <?php if($mensaje!=""){?>
  <div class="alert alert-success">
  <?php echo $mensaje; ?>
    <a href="mostrarCarrito.php" class="badge badge-success"> Ver carrito</a>
    </div>
  <?php } ?>
</div>
<div class="row">

  <?php

  if (isset($_GET['sucursal']) && is_numeric($_GET['sucursal'])) {
    $sentencia=$pdo->prepare("SELECT * FROM inventario where id_sucursal = ".$_GET['sucursal']);
  } else {
    $sentencia=$pdo->prepare("SELECT * FROM inventario ");
  }
  $sentencia->execute();
  $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
  //print_r($listaProductos);
  ?>

  <?php foreach( $listaProductos as $producto){ ?>
    <div class="col-4">
    <div class="card">
      <img 
      title="<?php echo $producto['pr_nombre'];?>"
      alt="<?php echo $producto['pr_nombre'];?>"
      class= "card-img-top"
      src="<?php echo $producto['img'];?>">
    <div class="card-body">
      <span><?php echo $producto['pr_nombre'];?></span>
      <h5 class="card-title">$<?php echo $producto['pr_CantidadExistentes'];?></h5>
      <p class="card-text"><?php echo $producto['pr_Precio_U_Venta'];?></p>

    <form action="" method="post">
      <input type="hidden" name="id_inventario" id="id_inventario" value="<?php echo openssl_encrypt($producto['id_inventario'],COD,KEY);?>">
      <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['pr_nombre'],COD,KEY);?>">
      <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['pr_CantidadExistentes'],COD,KEY);?>">
      <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
    <button class="btn btn-primary"
      name="btnAccion"
      value="Agregar"
      type="submit"> Agregar al carrito
      </button>
    </form>
     </div>
    </div>
  </div>
  <?php } ?>

</div>

<?php include 'pie.php';?>
