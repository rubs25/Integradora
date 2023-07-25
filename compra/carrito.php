<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
</head>
<body>
<html>
<head>
  <title>Carrito de Compras</title>
</head>
<body>
  <div class="header">
    <h1 class="titulo">Carrito de Compras</h1>
    <p class="subtitulo">Revisa los productos que has agregado al carrito</p>
    <div class="btn-catalogo">
      <a href="catalogo.php" class="btn-catalogo">Catalogo</a>
    </div>
  </div>

  <div class="container">
    <div class="carrito">
      <div class="carrito-items">
        <div class="carrito-item">
          <div class="carrito-imagen">
            <img src="carro1.jpg" alt="Juguete 1">
          </div>
          <div class="carrito-detalle">
            <h3 class="carrito-nombre">Juguete 1</h3>
            <p class="carrito-precio">$19.99</p>
            <p class="carrito-cantidad">Cantidad: 1</p>
          </div>
        </div>

        <div class="carrito-item">
          <div class="carrito-imagen">
            <img src="carro2.jpg" alt="Juguete 2">
          </div>
          <div class="carrito-detalle">
            <h3 class="carrito-nombre">Juguete 2</h3>
            <p class="carrito-precio">$24.99</p>
            <p class="carrito-cantidad">Cantidad: 2</p>
          </div>
        </div>

        <!-- Agrega más divs con la clase "carrito-item" para más productos en el carrito -->
      </div>

      <div class="carrito-resumen">
        <h2>Resumen del Carrito</h2>
        <p class="carrito-total">Total: $69.97</p>
        <a href="#" class="btn-vaciar">Vaciar Carrito</a>
        <a href="#" class="btn-comprar">Comprar</a>
        <a href="#" class="btn-comprar">Factura</a>
      </div>
    </div>
  </div>

  <div class="footer">
    <p>&copy; Motors Toys-PAGINA DE JUGUETES.</p>
  </div>
</body>
</html>
</body>
</html>