<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina del administrador </title>
</head>
<body>
<html>
<head>
  <style>
    /* Estilos CSS para el apartado de administrador */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }

    .header {
      background-color: #f7b801;
      padding: 20px;
      color: #fff;
      text-align: center;
    }

    .titulo {
      font-size: 48px;
      text-transform: uppercase;
      margin: 0;
      letter-spacing: 8px;
    }

    .subtitulo {
      font-size: 24px;
      margin-top: 10px;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .menu {
      display: flex;
      justify-content: space-around;
      margin-bottom: 20px;
    }

    .menu a {
      display: inline-block;
      padding: 10px 20px;
      background-color: #f7b801;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
      font-size: 16px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .menu a:hover {
      background-color: #f7b801;
    }

    .contenido {
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      border-radius: 4px;
    }

    .contenido h2 {
      font-size: 28px;
      margin-bottom: 10px;
      text-align: center;
      color: #f7b801;
      text-transform: uppercase;
    }

    .contenido p {
      font-size: 16px;
      margin-bottom: 10px;
      text-align: center;
      color: #555;
    }

    .footer {
      background-color: #f7b801;
      padding: 20px;
      color: #fff;
      text-align: center;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="header">
    <h1 class="titulo">Administrador</h1>
    <p class="subtitulo">Gestión de productos, clientes y usuarios</p>
  </div>

  <div class="container">
    <div class="menu">
      <a href="../admin/productos.php">Productos</a>
      
      <a href="../admin/clientes.php">Clientes</a>

      <a href="../admin/usuario.php">Usuarios</a>

      <a href="../admin/ventas.php">Ventas</a>
    </div>

    <div class="contenido" id="productos">
      <h2>Gestión de Productos</h2>
      <p>Aquí puedes administrar los productos de la tienda.</p>
      <!-- Agrega el formulario o la tabla para la gestión de productos -->
    </div>

    <div class="contenido" id="clientes">
      <h2>Gestión de Clientes</h2>
      <p>Aquí puedes administrar los clientes de la tienda.</p>
      <!-- Agrega el formulario o la tabla para la gestión de clientes -->
    </div>

    <div class="contenido" id="usuarios">
      <h2>Gestión de Usuarios</h2>
      <p>Aquí puedes administrar los usuarios del sistema.</p>
      <!-- Agrega el formulario o la tabla para la gestión de usuarios -->
    </div>

    <div class="contenido" id="ventas">
      <h2>Registro de Ventas</h2>
      <p>Aquí puedes ver el registro de las ventas realizadas.</p>
      <!-- Agrega el formulario o la tabla para el registro de ventas -->
    </div>
  </div>

  <div class="footer">
    <p>&copy; Motors Toys-PAGINA DE JUGUETES.</p>
  </div>
</body>
</html>
</body>
</html>