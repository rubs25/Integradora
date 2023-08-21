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
    <h2>Ventas</h2>


    <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Total</th>
            <th>Sucursal</th>
          </tr>
        </thead>
        <tbody>
          
    <?php 
    $query = "SELECT * FROM ventas";
    $result_clientes = mysqli_query($conexion, $query); //= $conexion->query($sql);
    while ($row = mysqli_fetch_assoc($result_clientes)){ ?> 
      
        <tr>
        <td><?php echo $row['id_venta']; ?></td>
        <td><?php echo $row['id_cliente']; ?></td>
        <td><?php echo $row['fecha_venta']; ?></td>
        <td><?php echo $row['hora_venta']; ?></td>
        <td><?php echo $row['total']; ?></td>
        <td><?php echo $row['id_sucursal']; ?></td>
        <td>
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
                <a href="../admin/Rventas.php?id=<?php echo $row['id']?>" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i> Generar Reporte</a>
              </div>
    </div>
  </div>
</body>
</html>