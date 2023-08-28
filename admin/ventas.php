<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../sesion/inicio_usuario.php');
    exit;
}
?>

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
    $totalVentas = 0; // Variable para almacenar el total de ventas

    $query = "SELECT * FROM ventas";
    $result_clientes = mysqli_query($conexion, $query);

    while ($row = mysqli_fetch_assoc($result_clientes)){ 
        $totalVentas += $row['total']; // Sumar el total de cada venta al total general
    ?> 
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
            <a href="../admin/Rventas.php?id=<?php echo $row['id']?>" target="_blank" class="btn btn-success">
                <i class="fas fa-file-pdf"></i> Generar Reporte
            </a>
        </div>
    </div>

    <div class="total-ventas">
        <p>Total de Ventas: $<?php echo number_format($totalVentas, 2); ?></p>
    </div>
  </div>
</body>
</html>
