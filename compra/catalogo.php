<!DOCTYPE html>
<html>
<head>
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">
<title>Catálogo de Juguetes</title>
  <style>
    /* Estilos CSS para el catálogo */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }

    .header {
      background-color: #333;
      padding: 20px;
      color: #fff;
      text-align: center;
    }

    .titulo {
      font-size: 36px;
      text-transform: uppercase;
      margin: 0;
    }

    .subtitulo {
      font-size: 18px;
      margin-top: 10px;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .seccion {
      margin-bottom: 40px;
    }

    .seccion-titulo {
      text-align: center;
      margin-bottom: 20px;
      font-size: 24px;
      color: #333;
    }

    .producto {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }

    .producto-item {
      background-color: #f9f9f9;
      border: 1px solid #ccc;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .producto-item:hover {
      transform: translateY(-5px);
    }

    .producto-imagen {
      margin-bottom: 20px;
    }

    .producto-imagen img {
      max-width: 100%;
      max-height: 200px;
    }

    .producto-titulo {
      font-size: 20px;
      color: #333;
      margin-bottom: 10px;
    }

    .producto-descripcion {
      font-size: 14px;
      color: #777;
      margin-bottom: 10px;
    }

    .producto-precio {
      font-size: 18px;
      color: #f00;
      font-weight: bold;
    }

    .btn-comprar {
      display: inline-block;
      padding: 10px 20px;
      background-color: #f00;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    .btn-comprar:hover {
      background-color: #c00;
    }

    .footer {
      background-color: #333;
      padding: 20px;
      color: #fff;
      text-align: center;
      font-size: 14px;
    }
    .btn-carrito {
      display: inline-block;
      padding: 5px 5px; 
      background-color: #f00;
      color: #fff;
      text-decoration: none;
      border-radius: 10px;
      transition: background-color 0.3s ease;
    }
    .btn-lista {
      display: inline-block;
      padding: 5px 5px; 
      background-color: #f00;
      color: #fff;
      text-decoration: none;
      border-radius: 10px;
      transition: background-color 0.3s ease;
    }

  </style>


</head>
<body>
  <div class="header">
    <h1 class="titulo">Catálogo de Juguetes</h1>
    <p class="subtitulo">Encuentra los mejores juguetes para niños y niñas</p>
    <div class="btn-lista">
      <a href="/compra/lista.php" class="btn-lista">Lista de deseos</a>
    </div>
    <div class="btn-carrito">
        <a href="/compra/carrito.php" class="btn-carrito">Carrito</a>
      </div>
      <div class="btn-carrito">
        <a href="/index.php" class="btn-carrito">Inicio</a>
      </div>
  </div>

  <div class="container">
    <div class="seccion">
      <h2 class="seccion-titulo">Juguetes para niños</h2>
      <div class="producto">
        <div class="producto-item">
          <div class="producto-imagen">
            <img src="/gaia-bootstrap-template-master/assets/img/carro1.jpg" alt="Juguete 1">
          </div>
          <h3 class="producto-titulo">Juguete 1</h3>
          <p class="producto-descripcion">Descripción del juguete 1</p>
          <p class="producto-precio">$19.99</p>
          <a href="/compra/carrito.php" class="btn-comprar">Comprar</a>
        </div>

        <div class="producto-item">
          <div class="producto-imagen">
            <img src="/gaia-bootstrap-template-master/assets/img/carro2.jpg" alt="Juguete 2">
          </div>
          <h3 class="producto-titulo">Juguete 2</h3>
          <p class="producto-descripcion">Descripción del juguete 2</p>
          <p class="producto-precio">$24.99</p>
          <a href="/compra/carrito.php" class="btn-comprar">Comprar</a>
        </div>

        <!-- Agrega más divs con la clase "producto-item" para más juguetes -->
      </div>
    </div>

    <div class="seccion">
      
      <div class="producto">
        <div class="producto-item">
          <div class="producto-imagen">
            <img src="/gaia-bootstrap-template-master/assets/img/carro1.jpg" alt="Juguete 3">
          </div>
          <h3 class="producto-titulo">Juguete 3</h3>
          <p class="producto-descripcion">Descripción del juguete 3</p>
          <p class="producto-precio">$14.99</p>
          <a href="/compra/carrito.php" class="btn-comprar">Comprar</a>
        </div>

        <div class="producto-item">
          <div class="producto-imagen">
            <img src="/gaia-bootstrap-template-master/assets/img/carro2.jpg" alt="Juguete 4">
          </div>
          <h3 class="producto-titulo">Juguete 4</h3>
          <p class="producto-descripcion">Descripción del juguete 4</p>
          <p class="producto-precio">$29.99</p>
          <a href="/compra/carrito.php" class="btn-comprar">Comprar</a>
        </div>

        <!-- Agrega más divs con la clase "producto-item" para más juguetes -->
      </div>
    </div>
  </div>

  <div class="footer">
    <p>&copy; Motors Toys-PAGINA DE JUGUETES.</p>
  </div>

  
</body>
</html>