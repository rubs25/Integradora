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
    <form action="registrar.php" method="POST" class="formulario">
      <label for="fecha">Fecha de Venta:</label>
      <input type="date" id="fecha" name="fecha" required>

      <label for="hora">Hora de Venta:</label>
      <input type="time" id="hora" name="hora" required>

      <label for="cliente">Cliente:</label>
      <select id="cliente" name="cliente">
        <!-- Opciones de clientes -->
      </select>

      <label for="cantidad">Cantidad de Productos:</label>
      <input type="number" id="cantidad" name="cantidad" min="0" required>

      <label for="iva">IVA:</label>
      <input type="number" id="iva" name="iva" step="0.01" min="0" required>

      <label for="subtotal">Subtotal:</label>
      <input type="number" id="subtotal" name="subtotal" step="0.01" min="0" required>

      <label for="metodo_pago">Método de Pago:</label>
      <select id="metodo_pago" name="metodo_pago">
        <!-- Opciones de métodos de pago -->
      </select>

      <label for="descuento">Descuento Aplicado:</label>
      <input type="number" id="descuento" name="descuento" step="0.01" min="0" required>

      <label for="total">Total:</label>
      <input type="number" id="total" name="total" step="0.01" min="0" required>

      <input type="submit" name="registrar.php" value="Agregar Venta">
    </form>

    <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>DNI</th>
            <th>Numero de telefono</th>
            <th>Correo</th>
            <th>Direccion</th>
          </tr>
        </thead>
        <tbody>
          
    <?php 
    $query = "SELECT * FROM t_clientes";
    $result_clientes = mysqli_query($conexion, $query); //= $conexion->query($sql);
    while ($row = mysqli_fetch_assoc($result_clientes)){ ?> 
      
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['apellido-paterno']; ?></td>
        <td><?php echo $row['apellido-materno']; ?></td>
        <td><?php echo $row['dni']; ?></td>
        <td><?php echo $row['telefono']; ?></td>
        <td><?php echo $row['correo']; ?></td>
        <td><?php echo $row['direccion']; ?></td>
        <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                Editar
              </a>
              <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                Eliminar
              </a>
            </td>
      </tr>
        <?php }?>
        </tbody>
      </table>
    <div class="mensaje">
      <!-- Aquí puedes mostrar mensajes de éxito o error -->
    </div>
  </div>
</body>
</html>