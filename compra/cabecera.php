<!DOCTYPE html>
<html>
<head>
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/logos2.jpg">
  <link rel="icon" type="image/png" sizes="96x96" href="/assets/img/logos2.jpg">
  <title>Catálogo</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
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
            <a class="nav-link" href="catalogo.php">Catalogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mostrarCarrito.php">Carrito(<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?>)</a>
          </li>
        </ul>
      </div>
      <label for="tipo">Elige la sucursal: </label>
      <select name="tipo" id="tipo">
        <option value="">Seleccionar</option>
        <option value="101">Queretaro</option>
        <option value="102">Sinaloa</option>
        <option value="103">Monterrey</option>
      </select>
    </div>
  </nav>
  <div class="container">
    <script>
      const select = document.getElementById('tipo');

      select.addEventListener('change', function handleChange(event) {
        console.log(event.target.value); // 👉 get selected VALUE
        var URLactual = window.location.origin + window.location.pathname;
        window.location.href = URLactual + "?sucursal=" + event.target.value;
      });
    </script>
  </div>
</body>
</html>