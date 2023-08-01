<?php
include 'config.php';
include 'cone.php'; 
include 'carrito.php';
include 'cabecera.php';

?>
  <br>

  <div class="alert alert-success">
  <?php echo ($mensaje); ?>
    <a href="#" class="badge badge-success"> Ver carrito</a>
    </div>
</div>
<div class="row">
  <?php
  $sentencia=$pdo->prepare("SELECT * FROM productos ");
  $sentencia->execute();
  $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
  //print_r($listaProductos);
  ?>
  <?php foreach( $listaProductos as $producto){ ?>
    <div class="col-3">
    <div class="card">
      <img 
      title="<?php echo $producto['pr_Nombre'];?>"
      alt="<?php echo $producto['pr_Nombre'];?>"
      class= "card-img-top"
      src="<?php echo $producto['imagen'];?>">
    <div class="card-body">
      <span><?php echo $producto['pr_Nombre'];?></span>
      <h5 class="card-title">$<?php echo $producto['pr_Costo_envio'];?></h5>
      <p class="card-text"><?php echo $producto['pr_Marca'];?></p>

    <form action="" method="post">
      <input type="hidden" name="id_producto" id="id_producto" value="<?php echo openssl_encrypt($producto['id_producto'],COD,KEY);?>">
      <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['pr_Nombre'],COD,KEY);?>">
      <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['pr_Costo_envio'],COD,KEY);?>">
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
