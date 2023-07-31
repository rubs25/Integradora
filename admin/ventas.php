<?php 
include('conecction.php');
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">

  <title>Panel de Administración - Gestión de Ventas</title>
  
</head>
<body>
  <div class="header">
    <h1 class="titulo">Panel de Administración</h1>
    <p class="subtitulo">Gestión de Ventas</p>
  </div>

  <div class="container">
    <h2>Agregar Venta</h2>
    <form action="add.php" method="POST" class="formulario">
      <label for="ve_fechaventa">Fecha de Venta:</label>
      <input type="date" id="fecha" name="ve_fechaventa" required>

      <label for="ve_horaventa">Hora de Venta:</label>
      <input type="time" id="hora" name="ve_horaventa" required>


      <label for="ve_cantidadprod">Cantidad de Productos:</label>
      <input type="number" id="cantidad" name="ve_cantidadprod" min="0" required>

      <label for="ve_iva">IVA:</label>
      <input type="number" id="iva" name="ve_iva" step="0.01" min="0" required>

      <label for="ve_subtotal">Subtotal:</label>
      <input type="number" id="subtotal" name="ve_subtotal" step="0.01" min="0" required>

      <label for="ve_metodopago">Método de Pago:</label>
      <input id="metodo_pago" name="ve_metodopago">
        <!-- Opciones de métodos de pago -->
      </select>

      <label for="descuent_aplicado">Descuento Aplicado:</label>
      <input type="number" id="descuento" name="descuent_aplicado" step="0.01" min="0" required>

      <input type="submit" name="add" value="Agregar Venta">
    </form>

    <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Cantidad</th>
            <th>Iva</th>
            <th>Subtotal</th>
            <th>Metodo de Pago</th>
            <th>Descuento</th>
          </tr>
        </thead>
        <tbody>
          
    <?php 
    $query = "SELECT * FROM ventas";
    $result_clientes = mysqli_query($conexion, $query); //= $conexion->query($sql);
    while ($row = mysqli_fetch_assoc($result_clientes)){ ?> 
      
        <tr>
        <td><?php echo $row['id_venta']; ?></td>
        <td><?php echo $row['ve_fechaventa']; ?></td>
        <td><?php echo $row['ve_horaventa']; ?></td>
        <td><?php echo $row['ve_cantidadprod']; ?></td>
        <td><?php echo $row['ve_iva']; ?></td>
        <td><?php echo $row['ve_subtotal']; ?></td>
        <td><?php echo $row['ve_metodopago']; ?></td>
        <td><?php echo $row['descuento_aplicado']; ?></td>
        <td>
              <a href="editar2.php?id=<?php echo $row['id_venta']?>" class="btn btn-secondary">
                Editar
              </a>
              <a href="delete2.php?id=<?php echo $row['id_venta']?>" class="btn btn-danger">
                Eliminar
              </a>
             
            </td>
      </tr>
        <?php }?>
        </tbody>
      </table>
    <div class="mensaje">
      <!-- Aquí puedes mostrar mensajes de éxito o error -->
      <div class="text-right">
                <a href="fpdf/PruebaH.php?id=<?php echo $row['id']?>" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i> Generar Reporte</a>
              </div>
    </div>
  </div>
</body>
</html>