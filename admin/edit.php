<?php 
include('conecction.php');
if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM t_user WHERE id=$id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $nombre = $row['nombre'];
      $gmail = $row['gmail'];
      $contrasena = $row['contrasena'];
    }
  }
  
  if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $nombre =  $_POST['nombre'];
    $gmail = $_POST['gmail'];
    $contrasena =$_POST['contrasena'];
  
    $query = "UPDATE t_user set nombre = '$nombre', gmail = '$gmail', contrasena = '$contrasena' WHERE id=$id";
    mysqli_query($conexion, $query);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: usuario.php');
  } 
?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <label for="nombre">Usuario:</label>
      <input type="text" name="nombre" value="<?php echo $nombre; ?>">

      <label for="gmail">Gmail:</label>
      <input type="email" name="gmail" value="<?php echo $gmail; ?>">

      <label for="contrasena">Contraseña:</label>
      <input type="contrasena" name="contrasena" value="<?php echo $contrasena; ?>">

        <input type="submit" name="edit" class="btn btn-primary"></input>
      </form>
      </div>
    </div>
  </div>
</div>
