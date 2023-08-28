<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../sesion/inicio_usuario.php');
    exit;
}
?>
<?php

$mensaje = "";

// Verificar si se hizo clic en el botón del formulario
if (isset($_POST['btnAccion'])) {
  $ID = ""; // Asignar un valor predeterminado a $ID

  switch ($_POST['btnAccion']) {  
    case 'Agregar':
      if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['cantidad']) && isset($_POST['id_inventario'])) {
        $ID = openssl_decrypt($_POST['id'], COD, KEY);
        $NOMBRE = openssl_decrypt($_POST['name'], COD, KEY);
        $PRECIO = openssl_decrypt($_POST['price'], COD, KEY);
        $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
        $INVENTARIO = openssl_decrypt($_POST['id_inventario'], COD, KEY);

        if (is_numeric($ID) && is_string($NOMBRE) && is_numeric($PRECIO) && is_numeric($CANTIDAD) && is_numeric($INVENTARIO)) {
          // Insertar detalles del producto en la tabla 'detalles_ventas'
          $servername = "localhost";
          $username = "root";
          $password = "Rubas2509";
          $dbname = "integradora4";

          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Preparar la consulta SQL
            $stmt = $conn->prepare("SELECT inventario.id_inventario, products.id, products.name, products.price, inventario.pr_CantidadExistentes 
            FROM inventario 
            INNER JOIN products 
            ON inventario.id_producto = products.id 
            WHERE inventario.id_producto = :id_producto");
            // Ejecutar la consulta SQL
            $stmt->execute(['id_producto' => $ID]);
            // Obtener los datos del producto
            $productData = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar si el producto existe en el inventario
            if ($productData && $productData['pr_CantidadExistentes'] > 0) {
              if (!isset($_SESSION['CARRITO'])) {
                $_SESSION['CARRITO'] = array();
              }

              $productExists = false;
              foreach ($_SESSION['CARRITO'] as $product) {
                if ($product['ID'] == $ID) {
                  $productExists = true;
                  break;
                }
              }

              if ($productExists) {
                echo "<script>alert('Seleccione más productos dentro del carrito');</script>";
                $mensaje = "Seleccione más productos dentro del carrito";
              } else {
                $product = array(
                  'ID' => $ID,
                  'NOMBRE' => $NOMBRE,
                  'CANTIDAD' => $CANTIDAD,
                  'PRECIO' => $PRECIO,
                  'INVENTARIO' => $INVENTARIO
                );
                $_SESSION['CARRITO'][$ID] = $product;
                $mensaje = "Producto agregado al carrito";
              }

              // Calcular subtotal e iva
              $subtotal = $product['PRECIO'] * $product['CANTIDAD'];
              $subtotal = $subtotal/1.16;
              $iva = $subtotal * 0.16;
              $total = $subtotal + $iva;

              // Insertar en la tabla carrito
              $sql = "INSERT INTO carrito (id_venta, id_inventario, cantidad, precio, subtotal, iva, total) VALUES (?, ?, ?, ?, ?, ?, ?)";
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(1, $product['ID_VENTA']); // Ajustar esta línea con la columna correcta
              $stmt->bindParam(2, $product['INVENTARIO']); // Ajustar esta línea con la columna correcta
              $stmt->bindParam(3, $product['CANTIDAD']);
              $stmt->bindParam(4, $product['PRECIO']);
              $stmt->bindParam(5, $subtotal);
              $stmt->bindParam(6, $iva);
              $stmt->bindParam(7, $total);
              $stmt->execute();
        
              $mensaje .= "";
            } else {
              $mensaje .= "El producto no está disponible en el inventario.<br/>";
            }
          } catch (PDOException $e) {
            $mensaje .= "Error al conectar a la base de datos: " . $e->getMessage();
          }
        } else {
          $mensaje .= "UPS.... Los datos enviados contienen valores incorrectos.<br/>";
        }
      } else {
        $mensaje .= "UPS.... Hubo un problema con los datos enviados.<br/>";
      }

      break;
            // ... (resto del código)
case "Eliminar":
  if (isset($_POST['id_inventario']) && is_numeric(openssl_decrypt($_POST['id_inventario'], COD, KEY))) {
      $ID = openssl_decrypt($_POST['id_inventario'], COD, KEY);
      $servername = "localhost";
      $username = "root";
      $password = "Rubas2509";
      $dbname = "integradora4";

      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          foreach ($_SESSION['CARRITO'] as $indice => $product) {
              if ($product['ID'] == $ID) {
                  // Eliminar el producto de la tabla carrito en la base de datos
                  $sqlEliminar = "DELETE FROM carrito WHERE id_inventario = ?";
                  $stmtEliminar = $conn->prepare($sqlEliminar);
                  $stmtEliminar->bindParam(1, $product['INVENTARIO']);
                  $stmtEliminar->execute();

                  // Eliminar el producto del carrito en la sesión
                  unset($_SESSION['CARRITO'][$indice]);

                  // Utilizar un mensaje en HTML en lugar de JavaScript
                  $mensaje = "Producto eliminado del carrito";
                  break; // Salir del ciclo una vez eliminado el producto
              }
          }

          $conn = null; // Cerrar la conexión
      } catch (PDOException $e) {
          $mensaje .= "Error al conectar a la base de datos: " . $e->getMessage();
      }
  }
  break;
// ... (resto del código
}}
        
      ?>