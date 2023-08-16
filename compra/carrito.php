<?php
session_start();

$mensaje = "";

if (isset($_POST['btnAccion'])) {
  switch ($_POST['btnAccion']) {
    case 'Agregar':
      if (is_numeric(openssl_decrypt($_POST['id_inventario'], COD, KEY))) {
        $ID = openssl_decrypt($_POST['id_inventario'], COD, KEY);
        $mensaje .= "OK ID correcto" . $ID . "<br/>";
      } else {
        $mensaje .= "UPS.... ID incorrecto" . $ID . "<br/>";
      }

      if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
        $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
        $mensaje .= "Ok nombre" . $NOMBRE . "<br/>";
      } else {
        $mensaje .= "Upps... algo pasa con el nombre" . "<br/>";
        break;
      }

      if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
        $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
        $mensaje .= "Ok cantidad" . $PRECIO . "<br/>";
      } else {
        $mensaje .= "Upps... algo pasa con la cantidad" . "<br/>";
        break;
      }

      if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
        $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
        $mensaje .= "Ok precio" . $CANTIDAD . "<br/>";
      } else {
        $mensaje .= "Upps... algo pasa con el Costo" . "<br/>";
        break;
      }

      if (!isset($_SESSION['CARRITO'])) {
        $producto = array(
          'ID' => $ID,
          'NOMBRE' => $NOMBRE,
          'PRECIO' => $PRECIO,
          'CANTIDAD' => $CANTIDAD
        );
        $_SESSION['CARRITO'][0] = $producto;
        $mensaje = "Producto agregado al carrito";
      } else {
        $idProductos = array_column($_SESSION['CARRITO'], "ID");

        if (in_array($ID, $idProductos)) {
          echo "<script>alert('Seleccione mas productos dentro del carrito');</script>";
          $mensaje = "Seleccione mas productos dentro del carrito";
        } else {
          $NumeroProductos = count($_SESSION['CARRITO']);
          $producto = array(
            'ID' => $ID,
            'NOMBRE' => $NOMBRE,
            'CANTIDAD' => $CANTIDAD,
            'PRECIO' => $PRECIO
          );
          $_SESSION['CARRITO'][$NumeroProductos] = $producto;
          $mensaje = "Producto agregado al carrito";
        }
      }

      // Insertar los registros en la tabla 'detalles_ventas'
      $servername = "localhost";
      $username = "root";
      $password = "Rubas2509";
      $dbname = "integradora2";

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        foreach ($_SESSION['CARRITO'] as $producto) {
          $subtotal = $producto['PRECIO'] * $producto['CANTIDAD'];
          // Agrega el descuento correspondiente si es necesario
          $descuento = 0; 
          $iva = $subtotal * 0.16; // Calcula el IVA correspondiente
          $total = $subtotal - $descuento + $iva;

          $sql = "INSERT INTO detalles_ventas (id_inventario, nombre_producto, cantidad, precio, subtotal, descuento, iva, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(1, $producto['ID']);
          $stmt->bindParam(2, $producto['NOMBRE']);
          $stmt->bindParam(3, $producto['CANTIDAD']);
          $stmt->bindParam(4, $producto['PRECIO']);
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

      break;

    case "Eliminar":
      if (is_numeric(openssl_decrypt($_POST['id_inventario'], COD, KEY))) {
        $ID = openssl_decrypt($_POST['id_inventario'], COD, KEY);
        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
          if ($producto['ID'] == $ID) {
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