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
      <label for="cl_nombre">Nombre:</label>
      <input type="text" id="nombre" name="cl_nombre" required>

      <label for="cl_apellidomat">Apellido Paterno:</label>
      <input type="text" id="apellido-materno" name="cl_apellidomat" required>

      <label for="cl_apellidopa">Apellido Materno:</label>
      <input type="text" id="apellido-paterno" name="apellido-materno" required>

     <!--  <label for="cl_dni">DNI:</label>
      <input type="text" id="dni" name="cl_dni" required> -->

      <label for="cl_numtelefono">Número de Teléfono:</label>
      <input type="tel" id="telefono" name="cl_numtelefono">

      <label for="cl_correo">Correo:</label>
      <input type="email" id="correo" name="cl_correo" required>

      <label for="cl_direccion">Dirección:</label>
      <textarea id="direccion" name="cl_direccion"></textarea>

      <input type="submit" name="alta" class="btn btn-primary"></input>
    
    </form>
    <table class="table table-bordered">
        <thead>
          <tr>
            <!-- <th>ID</th>  -->
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
    $query = "SELECT * FROM clientes";
    $result_clientes = mysqli_query($conexion, $query); //= $conexion->query($sql);
    while ($row = mysqli_fetch_assoc($result_clientes)){ ?> 
      
        <tr>
        <!-- <td><?php echo $row['id']; ?></td> -->
        <td><?php echo $row['cl_nombre']; ?></td>
        <td><?php echo $row['cl_apellidomat']; ?></td>
        <td><?php echo $row['cl_apellidopa']; ?></td>
         <td><?php echo $row['cl_dni']; ?></td> 
        <td><?php echo $row['cl_numtelefono']; ?></td>
        <td><?php echo $row['cl_correo']; ?></td>
        <td><?php echo $row['cl_direccion']; ?></td>
        <td>
              <a href="editar.php?id=<?php echo $row['cl_nombre']?>" class="btn btn-secondary">Editar
              </a>
              <a href="eliminar.php?id=<?php echo $row['cl_nombre']?>" class="btn btn-secondary">Eliminar
            </td>
      </tr>
        <?php }?>
        </tbody>
      </table>
    <div class="mensaje">
      <!-- Aquí puedes mostrar mensajes de éxito o error -->
      </a>
              <a href="fpdf/PruebaC.php?id=<?php echo $row['cl_nombre']?>" class="btn btn-secondary">Generar Reporte
              </a>
    </div>
  </div>
</body>
</html>