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
    <a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
  </div>
<?php } ?>
</div>
<div class="row">

<?php
if (isset($_GET['productos']) && is_numeric($_GET['productos'])) {
  // Si necesitas filtrar por producto, deberías hacer una consulta similar pero agregando un WHERE
  $sentencia=$pdo->prepare("SELECT * FROM products WHERE id=".$_GET['productos']);
} else {
  $sentencia=$pdo->prepare("SELECT * FROM products");
}
$sentencia->execute();
$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaProductos);
?>

<?php foreach( $listaProductos as $producto){ ?>
  <div class="col-4">
    <div class="card">
      <img 
      title="<?php echo $producto['image'];?>"
      alt="<?php echo $producto['image'];?>"
      class= "card-img-top"
      src="/admin/images/<?php echo $producto['image']; ?>">
      <div class="card-body">
        <span><?php echo $producto['name'];?></span>
        <h5 class="card-title">$<?php echo $producto['price'];?></h5>

        <form action="" method="post">
          <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY);?>">
          <input type="hidden" name="name" id="name" value="<?php echo openssl_encrypt($producto['name'],COD,KEY);?>">
          <input type="hidden" name="price" id="price"  value="<?php echo openssl_encrypt($producto['price'],COD,KEY);?>">
          <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
          <button class="btn btn-primary"
            name="btnAccion"
            value="Agregar"
            type="submit">Agregar al carrito
          </button>
        </form>

      </div>
    </div>
  </div>
<?php } ?>

</div>

<?php include 'pie.php';?>
