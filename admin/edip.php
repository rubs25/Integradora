<?php 
include('conecction.php');

if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM inventario WHERE id_inventario=$id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $nombre =  $row['pr_nombre'];
    $producto = $row['id_producto'];
    $cantexist =$row['pr_CantidadExistentes'];
    $sucursal =$row['id_sucursal'];
    $preioventa =$row['pr_Precio_U_Venta'];
    }
  }
  
  if (isset($_POST['edip.php'])) {
    $id = $_GET['id_inventario'];
    $nombre =  $_POST['pr_nombre'];
    $producto = $_POST['id_producto'];
    $cantexist =$_POST['pr_CantidadExistentes'];
    $sucursal =$_POST['id_sucursal'];
    $preioventa =$_POST['pr_Precio_U_Venta'];
   
  
    $query = "UPDATE inventario set pr_nombre = '$nombre', id_producto = '$producto', pr_CantidadExistentes = '$cantexist', id_sucursal = '$sucursal', pr_Precio_U_Venta = '$preioventa'WHERE id_inventario=$id";
    mysqli_query($conexion, $query);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: productos.php');
  } 
?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edip.php" method="POST" class="formulario">
    
      <label for="pr_nombre">Nombre:</label>
      <input type="text"  name="pr_nombre" value="<?php echo $nombre; ?>">

      <label for="id_producto">Producto:</label>
      <input type= "number"  name="id_producto" value="<?php echo $producto; ?>">

      <label for="pr_CantidadExistentes">Cantidad Existentes:</label>
      <input type="text"  name="pr_CantidadExistentes" value="<?php echo $cantexist; ?>">


      <label for="id_sucursal">Sucursal:</label>
      <input type="text"  name="id_sucursal" value="<?php echo $sucursal; ?>">

      <label for="pr_Precio_U_Venta">Precio:</label>
      <input type="number" id="iva" name="pr_Precio_U_Venta" value="<?php echo $preioventa; ?>">

      <input type="submit" name="edip" class="btn btn-primary"></input>

    </form>
      

      </div>
    </div>
  </div>
</div>


