<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
</head>
<body>
<html>
<head>
  <title>Carrito de Compras</title>
  <style>
    /* Estilos CSS para el carrito de compras */
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

    .carrito {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 20px;
    }

    .carrito-items {
      background-color: #f9f9f9;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .carrito-resumen {
      background-color: #f9f9f9;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .carrito-item {
      margin-bottom: 20px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 10px;
    }

    .carrito-item:last-child {
      border-bottom: none;
      margin-bottom: 0;
    }

    .carrito-imagen {
      display: inline-block;
      vertical-align: middle;
      margin-right: 10px;
    }

    .carrito-imagen img {
      max-width: 80px;
      max-height: 80px;
    }

    .carrito-detalle {
      display: inline-block;
      vertical-align: middle;
    }

    .carrito-nombre {
      font-size: 18px;
      color: #333;
      margin: 0;
    }

    .carrito-precio {
      font-size: 16px;
      color: #777;
    }

    .carrito-cantidad {
      font-size: 14px;
      color: #999;
      margin-top: 5px;
    }

    .carrito-total {
      font-size: 24px;
      color: #f00;
      text-align: right;
      margin: 0;
    }

    .btn-vaciar {
      display: inline-block;
      padding: 10px 20px;
      background-color: #f00;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    .btn-vaciar:hover {
      background-color: #c00;
    }

    .btn-comprar {
      display: inline-block;
      padding: 10px 20px;
      background-color: #0f0;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    .btn-comprar:hover {
      background-color: #0c0;
    }

    .footer {
      background-color: #333;
      padding: 20px;
      color: #fff;
      text-align: center;
      font-size: 14px;
    }
    .btn-catalogo {
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
    <h1 class="titulo">Carrito de Compras</h1>
    <p class="subtitulo">Revisa los productos que has agregado al carrito</p>
    <div class="btn-catalogo">
      <a href="/gaia-bootstrap-template-master/catalogo.html" class="btn-catalogo">Catalogo</a>
    </div>
  </div>

  <div class="container">
    <div class="carrito">
      <div class="carrito-items">
        <div class="carrito-item">
          <div class="carrito-imagen">
            <img src="/gaia-bootstrap-template-master/assets/img/carro1.jpg" alt="Juguete 1">
          </div>
          <div class="carrito-detalle">
            <h3 class="carrito-nombre">Juguete 1</h3>
            <p class="carrito-precio">$19.99</p>
            <p class="carrito-cantidad">Cantidad: 1</p>
          </div>
        </div>

        <div class="carrito-item">
          <div class="carrito-imagen">
            <img src="assets/img/carro2.jpg" alt="Juguete 2">
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
        <a href="/gaia-bootstrap-template-master/factura.html" class="btn-comprar">Factura</a>
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