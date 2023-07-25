<?php 
include('conecction.php');
if  (isset($_GET['id_producto'])) {
    $id = $_GET['id_producto'];
    $query = "SELECT * FROM productos WHERE id_producto=$id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $nombre =  $row['pr_Nombre'];
    $marca = $row['pr_Marca'];
    $codigo =$row['pr_codigoBarras'];
    $precio =$row['pr_Precio_U_Venta'];
    $cant =$row['pr_CantidadExistentes'];
    $costo =$row['pr_Costo_envio'];
    }
  }
  
  if (isset($_POST['edip.php'])) {
    $id = $_GET['id_productos'];
    $nombre =  $_POST['pr_Nombre'];
    $marca = $_POST['pr_Marca'];
    $codigo =$_POST['pr_codigoBarras'];
    $precio =$_POST['pr_Precio_U_Venta'];
    $cant =$_POST['pr_CantidadExistentes'];
    $costo =$_POST['pr_Costo_envio'];
   
  
    $query = "UPDATE productos set pr_Nombre = '$nombre', pr_marca = '$marca', pr_codigoBarras = '$codigo', pr_Precio_U_Venta = '$precio', pr_CantidadExistentes = '$cant', pr_Costo_envio = '$costo' WHERE id_productos=$id";
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
      <form action="adip.php" method="POST" class="formulario">
      <label for="pr_Nombre">Nombre:</label>
      <input type="text"  name="pr_Nombre" value="<?php echo $nombre; ?>"> 

      <label for="pr_Marca">Marca:</label>
      <input type="text"  name="pr_Marca" value="<?php echo $marca; ?>"> 


      <label for="pr_codigoBarras">Codigo de Barras:</label>
      <input type="text" id="cantidad" name="pr_codigoBarras" value="<?php echo $codigo; ?>"> 

      <label for="pr_Precio_U_Venta">Precio:</label>
      <input type="number" id="iva" name="pr_Precio_U_Venta" value="<?php echo $precio; ?>"> 

      <label for="pr_CantidadExistentes">Cantidad:</label>
      <input type="number" id="subtotal" name="pr_CantidadExistentes" value="<?php echo $cant; ?>"> 

      <label for="pr_Costo_envio">Costo:</label>
      <input type= "number"  name="pr_Costo_envio" value="<?php echo $costo; ?>"> 


      <input type="submit" name="edip" class="btn btn-primary"></input>

    </form>
      </div>
    </div>
  </div>
</div>
