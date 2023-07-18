<?php 
include('conecction.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">

  <title>Panel de Administración - Gestión de Clientes</title>
</head>
<body>
  <div class="header">
    <h1 class="titulo">Panel de Administración</h1>
    <p class="subtitulo">Gestión de Clientes</p>
  </div>

  <div class="container">
    
    <h2>Agregar Cliente</h2>
    <form action="alta.php" method="POST" class="formulario">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="apellido-paterno">Apellido Paterno:</label>
      <input type="text" id="apellido-paterno" name="apellido-paterno" required>

      <label for="apellido-materno">Apellido Materno:</label>
      <input type="text" id="apellido-materno" name="apellido-materno" required>

      <label for="dni">DNI:</label>
      <input type="text" id="dni" name="dni" required>

      <label for="telefono">Número de Teléfono:</label>
      <input type="tel" id="telefono" name="telefono">

      <label for="correo">Correo:</label>
      <input type="email" id="correo" name="correo" required>

      <label for="direccion">Dirección:</label>
      <textarea id="direccion" name="direccion"></textarea>

      <input type="submit" name="alta" class="btn btn-primary"></input>
    
    </form>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th> 
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <!-- <th>DNI</th>  -->
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
        <td><?php echo $row['apellido_paterno']; ?></td>
        <td><?php echo $row['apellido_materno']; ?></td>
        <!-- <td><?php echo $row['dni']; ?></td> -->
        <td><?php echo $row['telefono']; ?></td>
        <td><?php echo $row['correo']; ?></td>
        <td><?php echo $row['direccion']; ?></td>
        <td>
              <a href="editar.php?id=<?php echo $row['nombre']?>" class="btn btn-secondary">Editar
              </a>
              <a href="eliminar.php?id=<?php echo $row['nombre']?>" class="btn btn-secondary">Eliminar
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