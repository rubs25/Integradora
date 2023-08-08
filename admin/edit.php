<?php 
include('conecction.php');
if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM t_user WHERE id_user=$id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $usuario = $row['usuario'];
      $tipo = $row['tipo_usuario'];
      $contrasena = $row['contrasena'];
    }
  }
  
  if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $usuario =  $_POST['usuario'];
    $tipo = $_POST['tipo'];
    $contrasena =$_POST['contrasena'];
  
    $query = "UPDATE t_user set usuario = '$usuario', tipo_usuario = '$tipo', contrasena = '$contrasena' WHERE id_user=$id";
    mysqli_query($conexion, $query);
    header('Location: usuario.php');
  } 
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">
  <title>Editar Productos</title>
  
</head>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST" class="formulario">
      <label for="usuario">Usuario:</label>
      <input type="text" name="usuario" value="<?php echo $usuario; ?>"> 
      <label for="tipo">Tipo de usuario:</label>
      <!-- <input type="number" name="tipo" value="<?php echo $tipo; ?>"> -->
      <select name="tipo" id="tipo">
        <option value="1">Administrador</option>
        <option value="2">Cliente</option>
        <option value="3">Empleado</option>
      </select>

      <label for="contrasena">Contraseña:</label>
      <input type="contrasena" name="contrasena" value="<?php echo $contrasena; ?>">

        <input type="submit" name="edit" class="btn btn-primary"></input>
      </form>
      </div>
    </div>
  </div>
</div>


</body>
</html>