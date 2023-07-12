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
    

    <h2>Agregar Producto</h2>
    <form class="formulario">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="categoria">Categoría:</label>
      <input type="text" id="categoria" name="categoria" required>

      <label for="color">Color:</label>
      <input type="text" id="color" name="color" required>

      <label for="marca">Marca:</label>
      <input type="text" id="marca" name="marca" required>

      <label for="codigo-barras">Código de Barras:</label>
      <input type="text" id="codigo-barras" name="codigo-barras" required>

      <label for="precio-compra">Precio Compra:</label>
      <input type="number" id="precio-compra" name="precio-compra" min="0" step="0.01" required>

      <label for="precio-venta">Precio Venta:</label>
      <input type="number" id="precio-venta" name="precio-venta" min="0" step="0.01" required>

      <label for="medida">Medida:</label>
      <input type="text" id="medida" name="medida" required>

      <label for="empaque">Empaque:</label>
      <input type="text" id="empaque" name="empaque" required>

      <label for="garantia">Garantía:</label>
      <input type="text" id="garantia" name="garantia" required>

      <label for="cantidad-disponible">Cantidad Disponible:</label>
      <input type="number" id="cantidad-disponible" name="cantidad-disponible" min="0" required>

      <label for="costo-envio">Costo de Envío:</label>
      <input type="number" id="costo-envio" name="costo-envio" min="0" step="0.01" required>

      <input type="submit" value="Agregar Producto">
    </form>
    </form>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Color</th>
            <th>Marca</th>
            <th>Codigo</th>
            <th>Precio Compra</th>
            <th>Precio Venta</th>
            <th>Medida</th>
            <th>Empaque</th>
            <th>Garantía</th>
            <th>Cantidad</th>
            <th>Costo</th>
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