<?php
include 'config.php';
include 'cone.php';
include 'carrito.php';
include 'cabecera.php';

// Verificar si se ha seleccionado una sucursal
if (isset($_GET['sucursal'])) {
  $sucursal = $_GET['sucursal'];
  $sentencia = $pdo->prepare("SELECT p.id AS product_id, p.name AS product_name, p.price AS product_price, p.image AS product_image, 
i.pr_CantidadExistentes, i.id_sucursal
FROM products p
INNER JOIN inventario i ON p.id = i.id_producto
WHERE i.id_sucursal = :sucursal");
  $sentencia->bindParam(':sucursal', $sucursal, PDO::PARAM_INT);
} else {
  // Si no se selecciona una sucursal, muestra todos los productos
  $sentencia = $pdo->prepare("SELECT p.id AS product_id, p.name AS product_name, p.price AS product_price, p.image AS product_image, 
i.pr_CantidadExistentes, i.id_sucursal
FROM products p
INNER JOIN inventario i ON p.id = i.id_producto");
}

$sentencia->execute();
$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row">
<?php foreach ($listaProductos as $producto) { ?>
  <div class="col-md-4 mb-4">
    <div class="card">
      <img 
        title="<?php echo $producto['product_image']; ?>"
        alt="<?php echo $producto['product_image']; ?>"
        class="card-img-top"
        src="../admin/images/<?php echo $producto['product_image']; ?>">
      <div class="card-body">
        <span><?php echo $producto['product_name']; ?></span>
        <h5 class="card-title">$<?php echo $producto['product_price']; ?></h5>
        
        <p>Cantidad existente: <?php echo $producto['pr_CantidadExistentes']; ?></p>
        <p>Sucursal: <?php echo $producto['id_sucursal']; ?></p>

        <form action="" method="post">
          <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['product_id'], COD, KEY); ?>">
          <input type="hidden" name="name" id="name" value="<?php echo openssl_encrypt($producto['product_name'], COD, KEY); ?>">
          <input type="hidden" name="price" id="price"  value="<?php echo openssl_encrypt($producto['product_price'], COD, KEY); ?>">
          <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
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

<?php include 'pie.php'; ?>
