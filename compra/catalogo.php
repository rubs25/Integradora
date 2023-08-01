<?php
include 'config.php';
include 'cone.php'; 
?>

<!DOCTYPE html>
<html>
<head>

  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logos2.jpg">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logos2.jpg">
<title>Catálogo</title>
<link rel="stylesheet" href=	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css> 

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</head>
<body>
  <div class="header">
    <h1 class="titulo"><center>Nuestro Catálogo.</center></h1>
  </div>
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">Catalogo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Carrito (0)</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <br>
  <div class="alert alert-success">
    Pantalla de mensaje...
    <a href="#" class="badge badge-success"> Ver carrito</a>
    </div>
</div>
<div class="row">
  <?php
  $sentencia=$pdo->prepare("SELECT * FROM productos ");
  $sentencia->execute();
  $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
  //print_r($listaProductos);
  ?>
  <?php foreach( $listaProductos as $producto){ ?>
    <div class="col-3">
    <div class="card">
      <img 
      title="<?php echo $producto['imagen'];?>"
      alt="<?php echo $producto['imagen'];?>"
      class= "card-img-top"
      src="<?php echo $producto['imagen'];?>">
    <div class="card-body">
      <span><?php echo $producto['pr_Nombre'];?></span>
      <h5 class="card-title">$<?php echo $producto['pr_Costo_envio'];?></h5>
      <p class="card-text"><?php echo $producto['pr_Marca'];?></p>

      <button class="btn btn-primary"
      name="btnAccion"
      value="Agregar"
      type="submit"> Agregar al carrito
      </button>
     </div>
    </div>
  </div>
  <?php } ?>

</div>

  <div class="footer">
    <p><center>&copy;Motors Toys-PAGINA DE JUGUETES.</center>
    </p>
  </div>

  
</body>
</html>