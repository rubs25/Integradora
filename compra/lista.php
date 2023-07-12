<!DOCTYPE html>
<html>
<head>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">

  <title>Lista de Deseos</title>
  <style>
    /* Estilos CSS para la lista de deseos */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      background: linear-gradient(to right, #FFA63D, #FF3D77, #338AFF);
      padding: 20px;
      text-align: center;
    }

    h1 {
      color: #fff;
      text-transform: uppercase;
      margin: 0;
      letter-spacing: 4px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .wishlist-item {
      display: flex;
      align-items: center;
      background-color: #f9f9f9;
      border-radius: 5px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      padding: 20px;
    }

    .wishlist-item img {
      width: 100px;
      height: 100px;
      border-radius: 5px;
      object-fit: cover;
      margin-right: 20px;
      border: 2px solid #fff;
    }

    .wishlist-item-content {
      flex: 1;
    }

    .wishlist-item h2 {
      margin-top: 0;
      color: #333;
      font-size: 24px;
      margin-bottom: 5px;
    }

    .wishlist-item p {
      color: #666;
      font-size: 16px;
      margin-bottom: 10px;
    }

    .wishlist-item .price {
      font-weight: bold;
      color: #e67e22;
    }

    .wishlist-item .stock-status {
      font-style: italic;
      color: #c0392b;
      margin-top: 5px;
    }

    .header-buttons {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .header-buttons a {
      display: inline-block;
      padding: 10px 20px;
      margin-right: 10px;
      background-color: #fff;
      color: #333;
      text-decoration: none;
      font-weight: bold;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .header-buttons a:hover {
      background-color: #eee;
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>Lista de Deseos</h1>
    <div class="header-buttons">
      <a href="/gaia-bootstrap-template-master/index.html">Inicio</a>
      <a href="/gaia-bootstrap-template-master/catalogo.html">Catálogo</a>
    </div>
  </div>

  <div class="container">
    <div class="wishlist-item">
      <img src="/gaia-bootstrap-template-master/assets/img/carro1.jpg" alt="Producto 1">
      <div class="wishlist-item-content">
        <h2>Nombre del Producto 1</h2>
        <p>Precio unitario: <span class="price">$19.99</span></p>
        <p>Estado de stock: <span class="stock-status">Disponible</span></p>
      </div>
    </div>

    <div class="wishlist-item">
      <img src="/gaia-bootstrap-template-master/assets/img/carro1.jpg" alt="Producto 2">
      <div class="wishlist-item-content">
        <h2>Nombre del Producto 2</h2>
        <p>Precio unitario: <span class="price">$29.99</span></p>
        <p>Estado de stock: <span class="stock-status">Agotado</span></p>
      </div>
    </div>

    <!-- Agrega más elementos de la lista de deseos aquí -->

    <div class="wishlist-item">
      <img src="/carro3.webp" alt="Producto 3">
      <div class="wishlist-item-content">
        <h2>Nombre del Producto 3</h2>
        <p>Precio unitario: <span class="price">$39.99</span></p>
        <p>Estado de stock: <span class="stock-status">Disponible</span></p>
      </div>
    </div>

    <div class="wishlist-item">
      <img src="/carro4.jpg" alt="Producto 4">
      <div class="wishlist-item-content">
        <h2>Nombre del Producto 4</h2>
        <p>Precio unitario: <span class="price">$49.99</span></p>
        <p>Estado de stock: <span class="stock-status">Disponible</span></p>
      </div>
    </div>

    <div class="wishlist-item">
      <img src="/carro1.jpg" alt="Producto 5">
      <div class="wishlist-item-content">
        <h2>Nombre del Producto 5</h2>
        <p>Precio unitario: <span class="price">$59.99</span></p>
        <p>Estado de stock: <span class="stock-status">Agotado</span></p>
      </div>
    </div>

    <div class="wishlist-item">
      <img src="/carro2.jpg" alt="Producto 6">
      <div class="wishlist-item-content">
        <h2>Nombre del Producto 6</h2>
        <p>Precio unitario: <span class="price">$69.99</span></p>
        <p>Estado de stock: <span class="stock-status">Disponible</span></p>
      </div>
    </div>

    <div class="wishlist-item">
      <img src="/carro3.webp" alt="Producto 7">
      <div class="wishlist-item-content">
        <h2>Nombre del Producto 7</h2>
        <p>Precio unitario: <span class="price">$79.99</span></p>
        <p>Estado de stock: <span class="stock-status">Agotado</span></p>
      </div>
    </div>

    <div class="wishlist-item">
      <img src="/carro4.jpg" alt="Producto 8">
      <div class="wishlist-item-content">
        <h2>Nombre del Producto 8</h2>
        <p>Precio unitario: <span class="price">$89.99</span></p>
        <p>Estado de stock: <span class="stock-status">Disponible</span></p>
      </div>
    </div>

    <div class="wishlist-item">
      <img src="/carro1.jpg" alt="Producto 9">
      <div class="wishlist-item-content">
        <h2>Nombre del Producto 9</h2>
        <p>Precio unitario: <span class="price">$99.99</span></p>
        <p>Estado de stock: <span class="stock-status">Agotado</span></p>
      </div>
    </div>

    <div class="wishlist-item">
      <img src="/carro3.webp" alt="Producto 10">
      <div class="wishlist-item-content">
        <h2>Nombre del Producto 10</h2>
        <p>Precio unitario: <span class="price">$109.99</span></p>
        <p>Estado de stock: <span class="stock-status">Disponible</span></p>
      </div>
    </div>
  </div>
</body>
</html>