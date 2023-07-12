<?php 
include('conecction.php');
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="admin.css">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">

  <title>Panel de Administración - Gestión de Usuarios</title>
</head>
<body>
  <div class="header">
    <h1 class="titulo">Panel de Administración</h1>
    <p class="subtitulo">Gestión de Usuarios</p>
  </div>
  <div class="container">
    <h2>Agregar Usuario</h2>
    <form action="registrar.php" method="POST" class="users-form">
      <label for="nombre">Usuario:</label>
      <input type="text" name="nombre">

      <label for="gmail">Gmail:</label>
      <input type="email" name="gmail">

      <label for="contrasena">Contraseña:</label>
      <input type="contrasena" name="contrasena">
 
      <input type="submit" name="registrar" class="btn btn-primary"></input>


    </form>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Correo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          
    <?php 
    $query = "SELECT * FROM t_user WHERE rol = 'USER'";
    $result_users = mysqli_query($conexion, $query); //= $conexion->query($sql);
    while ($row = mysqli_fetch_assoc($result_users)){ ?> 
      
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['gmail']; ?></td>
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
    </div>
  </div>
</body>
</html>