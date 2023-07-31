<?php 
include('conecction.php');

if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM ventas WHERE id_venta=$id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 0) {
      $row = mysqli_fetch_array($result);
      $fecha =  $row['ve_fechaventa'];
      $hora = $row['ve_horaventa'];
      $cantidad =$row['ve_cantidadprod'];
      $iva =$row['ve_iva'];
      $sub =$row['ve_subtotal'];
      $metpago =$row['ve_metodopago'];
      $descapli =$row['descuento_aplicado'];
    }
  }
  
  if (isset($_POST['editar2'])) {
    $id = $_GET['id_venta'];
    $fecha =  $_POST['ve_fechaventa'];
    $hora = $_POST['ve_horaventa'];
    $cantidad =$_POST['ve_cantidadprod'];
    $iva =$_POST['ve_iva'];
    $sub =$_POST['ve_subtotal'];
    $metodopago =$_POST['ve_metodopago'];
    $descapli =$_POST['descuento_aplicado'];


    $query = "UPDATE ventas set ve_fechaventa = '$fecha', ve_horaventa = '$hora', ve_cantidadprod = '$cantidad', ve_iva = '$iva', ve_subtotal='$sub', ve_metodopago='$metpago', descuento_aplicado='$descapli' WHERE id=$id";
    mysqli_query($conexion, $query);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: ventas.php');
  } 
?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar2.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <label for="ve_fechaventa">Fecha de Venta:</label>
      <input type="date" id="fecha" name="ve_fechaventa" value="<?php echo $fecha; ?>">

      <label for="ve_horaventa">Hora de Venta:</label>
      <input type="time" id="hora" name="ve_horaventa" value="<?php echo $hora; ?>">


      <label for="ve_cantidadprod">Cantidad de Productos:</label>
      <input type="number" id="cantidad" name="ve_cantidadprod" min="0" value="<?php echo $cantidad; ?>">

      <label for="ve_iva">IVA:</label>
      <input type="number" id="iva" name="ve_iva" step="0.01" min="0" value="<?php echo $iva; ?>">

      <label for="ve_subtotal">Subtotal:</label>
      <input type="number" id="subtotal" name="ve_subtotal" step="0.01" min="0" value="<?php echo $sub; ?>">

      <label for="ve_metodopago">Método de Pago:</label>
      <input id="metodo_pago" name="ve_metodopago" value="<?php echo $metodopago; ?>">
        <!-- Opciones de métodos de pago -->
      </select>

      <label for="descuent_aplicado">Descuento Aplicado:</label>
      <input type="number" id="descuento" name="descuent_aplicado" step="0.01" min="0" value="<?php echo $descapli; ?>">

        <input type="submit" name="editar2" class="btn btn-primary"></input>
      </form>
      </div>
    </div>
  </div>
</div>