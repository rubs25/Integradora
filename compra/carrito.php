<?php
session_start();

$mensaje = "";

// Verificar si se hizo clic en el botón del formulario
if (isset($_POST['btnAccion'])) {
  $ID = ""; // Asignar un valor predeterminado a $ID

  switch ($_POST['btnAccion']) {
    case 'Agregar':
      if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['cantidad'])) {
        $ID = openssl_decrypt($_POST['id'], COD, KEY);
        $NOMBRE = openssl_decrypt($_POST['name'], COD, KEY);
        $PRECIO = openssl_decrypt($_POST['price'], COD, KEY);
        $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);

        if (is_numeric($ID) && is_string($NOMBRE) && is_numeric($PRECIO) && is_numeric($CANTIDAD)) {
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
              'PRECIO' => $PRECIO
            );
            $_SESSION['CARRITO'][$ID] = $product;
            $mensaje = "Producto agregado al carrito";
          }

          // Insertar detalles del producto en la tabla 'detalles_ventas'
          $servername = "localhost";
          $username = "root";
          $password = "Rubas2509";
          $dbname = "integradora2";

          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            foreach ($_SESSION['CARRITO'] as $product) {
              $subtotal = $product['PRECIO'] * $product['CANTIDAD'];

              // Calcular descuento e impuesto
              $descuento = 0;
              $iva = $subtotal * 0.16;
              $total = $subtotal - $descuento + $iva;

              $sql = "INSERT INTO detalles_ventas (id_inventario, nombre_producto, cantidad, precio, subtotal, descuento, iva, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(1, $product['ID']);
              $stmt->bindParam(2, $product['NOMBRE']);
              $stmt->bindParam(3, $product['CANTIDAD']);
              $stmt->bindParam(4, $product['PRECIO']);
              $stmt->bindParam(5, $subtotal);
              $stmt->bindParam(6, $descuento);
              $stmt->bindParam(7, $iva);
              $stmt->bindParam(8, $total);
              $stmt->execute();
            }

            $conn = null; // Cerrar la conexión

            $mensaje .= "";
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

    case "Eliminar":
      if (isset($_POST['id_inventario']) && is_numeric(openssl_decrypt($_POST['id_inventario'], COD, KEY))) {
        $ID = openssl_decrypt($_POST['id_inventario'], COD, KEY);
        foreach ($_SESSION['CARRITO'] as $indice => $product) {
          if ($product['ID'] == $ID) {
            unset($_SESSION['CARRITO'][$indice]);
            echo "<script>alert('Producto eliminado del carrito');</script>";
          }
        }
      } else {
        $mensaje .= "UPS.... ID incorrecto" . $ID . "<br/>";
      }
      break;

    default:
      echo "Acción no definida";
      break;
  }
}

?>
