<!DOCTYPE html>
<html>
<head>
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">

  <title>Facturación</title>
  <style>
    /* Estilos CSS para el formulario de facturación */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .formulario {
      margin-bottom: 20px;
    }

    .formulario label {
      display: block;
      margin-bottom: 5px;
      color: #333;
      font-weight: bold;
    }

    .formulario input[type="date"],
    .formulario input[type="time"],
    .formulario input[type="number"],
    .formulario select {
      padding: 8px;
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .formulario input[type="submit"] {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
      font-size: 16px;
      display: inline-block;
    }

    .formulario input[type="submit"]:hover {
      background-color: #555;
    }

    .mensaje {
      padding: 10px;
      background-color: #f7b801;
      color: #fff;
      margin-bottom: 10px;
      border-radius: 4px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Facturación</h2>
    <form class="formulario">
      <label for="fecha">Fecha de Venta:</label>
      <input type="date" id="fecha" name="fecha" required>

      <label for="hora">Hora de Venta:</label>
      <input type="time" id="hora" name="hora" required>

      <label for="cantidad">Cantidad de Productos:</label>
      <input type="number" id="cantidad" name="cantidad" min="0" required>

      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" step="0.01" min="0" required>

      <label for="subtotal">Subtotal:</label>
      <input type="number" id="subtotal" name="subtotal" step="0.01" min="0" required>

      <label for="metodo_pago">Método de Pago:</label>
      <select id="metodo_pago" name="metodo_pago">
        <option value="efectivo">Efectivo</option>
        <option value="tarjeta">Tarjeta de Crédito</option>
        <option value="transferencia">Transferencia Bancaria</option>
      </select>

      <input type="submit" value="Generar Factura">
    </form>

    <div class="mensaje">
      <!-- Aquí puedes mostrar mensajes de éxito o error -->
    </div>
  </div>
</body>
</html>