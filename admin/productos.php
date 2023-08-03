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
    
      <label for="pr_nombre">Nombre:</label>
      <input type="text"  name="pr_nombre" required>

      <label for="id_producto">Producto:</label>
      <input type= "number"  name="id_producto">

      <label for="pr_CantidadExistentes">Cantidad Existentes:</label>
      <input type="text"  name="pr_CantidadExistentes" required>


      <label for="id_sucursal">Sucursal:</label>
      <input type="text"  name="id_sucursal" required>

      <label for="pr_Precio_U_Venta">Precio:</label>
      <input type="number" id="iva" name="pr_Precio_U_Venta" required>

      <input type="submit" name="adp" value="Agregar producto">

    </form>

    <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Producto</th>
            <th>Cantidad Existentes</th>
            <th>Sucursal</th>
            <th>Precio Venta</th>
            
          </tr>
        </thead>
        <tbody>
          
    <?php 
    $query = "SELECT * FROM inventario";
    $result_clientes = mysqli_query($conexion, $query); //= $conexion->query($sql);
    while ($row = mysqli_fetch_assoc($result_clientes)){ ?> 
      
        <tr>
        <td><?php echo $row['id_inventario']; ?></td>
        <td><?php echo $row['pr_nombre']; ?></td>
        <td><?php echo $row['id_producto']; ?></td>
        <td><?php echo $row['pr_CantidadExistentes']; ?></td>
        <td><?php echo $row['id_sucursal']; ?></td>
        <td><?php echo $row['pr_Precio_U_Venta']; ?></td>
        
        <td>
              <a href="edip.php?id=<?php echo $row['id_inventario']?>" class="btn btn-secondary">
                Editar
              </a>
              <a href="ed.php?id=<?php echo $row['id_inventario']?>" class="btn btn-danger">
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
                <a href="../admin/fpdf/Productoscrud.php" class="btn btn-success"><i class="fas fa-file-pdf">
                </i> Generar Reporte</a>
              </div>
    </div>
  </div>
</body>
</html>