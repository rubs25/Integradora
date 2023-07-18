<?php 
include('conecction.php');
if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM t_productos WHERE id=$id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $nombre =$row['nombre'];
      $cat = $row['categoria'];
      $color =$row['color'];
      $marca =$row['marca'];
      $codigo =$row['codigo'];
      $precioc =$row['precioc'];
      $preciov =$row['preciov'];
      $medida =$row['medida'];
      $empaque =$row['empaque'];
      $garantia =$row['garantia'];
      $cantd =$row['cantd'];
      $costo =$row['costo'];
    }
  }
  
  if (isset($_POST['edi'])) {
    $id = $_GET['id'];
    $nombre =  $_POST['nombre'];
    $cat = $_POST['categoria'];
    $color =$_POST['color'];
    $marca =$_POST['marca'];
    $codigo =$_POST['codigo'];
    $precioc =$_POST['precioc'];
    $preciov =$_POST['preciov'];
    $medida =$_POST['medida'];
    $empaque =$_POST['empaque'];
    $garantia =$_POST['garantia'];
    $cantd =$_POST['cantd'];
    $costo =$_POST['costo'];
  
    $query = "UPDATE t_productos set nombre = '$nombre', categoria = '$cat', color = '$color', marca = '$marca', codigo = '$codigo', precioc = '$precioc', preciov = '$preciov', medida = '$medida', empaque = '$empaque', garantia = '$garantia', cantd = '$cantd', costo = '$costo' WHERE id=$id";
    mysqli_query($conexion, $query);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: productos.php');
  } 
?>
<link rel="stylesheet" href="admin.css">
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edi.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>">

      <label for="categoria">Categoría:</label>
      <input type="text" id="categoria" name="categoria" value="<?php echo $cat; ?>">

      <label for="color">Color:</label>
      <input type="text" id="color" name="color" value="<?php echo $color; ?>">

      <label for="marca">Marca:</label>
      <input type="text" id="marca" name="marca" value="<?php echo $marca; ?>">

      <label for="codigo-barras">Código de Barras:</label>
      <input type="text" id="codigo-barras" name="codigo" value="<?php echo $codigo; ?>">

      <label for="precio-compra">Precio Compra:</label>
      <input type="number" id="precio-compra" name="precioc" min="0" step="0.01" value="<?php echo $precioc; ?>">

      <label for="precio-venta">Precio Venta:</label>
      <input type="number" id="precio-venta" name="preciov" min="0" step="0.01" value="<?php echo $preciov; ?>">

      <label for="medida">Medida:</label>
      <input type="text" id="medida" name="medida" value="<?php echo $medida; ?>">

      <label for="empaque">Empaque:</label>
      <input type="text" id="empaque" name="empaque" value="<?php echo $empaque; ?>">

      <label for="garantia">Garantía:</label>
      <input type="text" id="garantia" name="garantia" value="<?php echo $garantia; ?>">

      <label for="cantidad-disponible">Cantidad Disponible:</label>
      <input type="number" id="cantidad-disponible" name="cantd" min="0" value="<?php echo $cantd; ?>">

      <label for="costo-envio">Costo de Envío:</label>
      <input type="number" id="costo-envio" name="costo" min="0" step="0.01" value="<?php echo $costo; ?>">

      <input type="submit" name="edi" value="Agregar Producto">
    </form>
      </div>
    </div>
  </div>
</div>