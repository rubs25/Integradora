<?php 
include('conecction.php');
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">

  <title>Panel de Administración - Gestión de Productos</title>
  
</head>
<body>
  <div class="header">
    <h1 class="titulo">Panel de Administración</h1>
    <p class="subtitulo">Gestión de Productos</p>
  </div>

  <div class="container">
    <h2>Agregar un Producto</h2>
    <form action="adp.php" method="POST" class="formulario">
    <label for="pr_id">id:</label>
      <input type="number"  name="pr_id" required>
      <label for="pr_Nombre">Nombre:</label>
      <input type="text"  name="pr_Nombre" required>

      <label for="pr_Marca">Marca:</label>
      <input type="text"  name="pr_Marca" required>


      <label for="pr_codigoBarras">Codigo de Barras:</label>
      <input type="text" id="cantidad" name="pr_codigoBarras" required>

      <label for="pr_Precio_U_Venta">Precio:</label>
      <input type="number" id="iva" name="pr_Precio_U_Venta" required>

      <label for="pr_CantidadExistentes">Cantidad:</label>
      <input type="number" id="subtotal" name="pr_CantidadExistentes" required>

      <label for="pr_Costo_envio">Costo:</label>
      <input type= "number"  name="pr_Costo_envio">


      <input type="submit" name="adp" value="Agregar producto">

    </form>

    <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Codigo de Barras</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Costo</th>
          </tr>
        </thead>
        <tbody>
          
    <?php 
    $query = "SELECT * FROM productos";
    $result_clientes = mysqli_query($conexion, $query); //= $conexion->query($sql);
    while ($row = mysqli_fetch_assoc($result_clientes)){ ?> 
      
        <tr>
        <td><?php echo $row['id_producto']; ?></td>
        <td><?php echo $row['pr_Nombre']; ?></td>
        <td><?php echo $row['pr_Marca']; ?></td>
        <td><?php echo $row['pr_codigoBarras']; ?></td>
        <td><?php echo $row['pr_Precio_U_Venta']; ?></td>
        <td><?php echo $row['pr_CantidadExistentes']; ?></td>
        <td><?php echo $row['pr_Costo_envio']; ?></td>
        <td>
              <a href="edip.php?id=<?php echo $row['id_producto']?>" class="btn btn-secondary">
                Editar
              </a>
              <a href="#?id=<?php echo $row['id_producto']?>" class="btn btn-danger">
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
                <a href="#?id=<?php echo $row['id_producto']?>" class="btn btn-success"><i class="fas fa-file-pdf">
                </i> Generar Reporte</a>
              </div>
    </div>
  </div>
</body>
</html>