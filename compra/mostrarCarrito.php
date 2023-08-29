
<?php
include 'config.php';
include 'carrito.php';
include 'cabecera.php';

// Establecer la conexión a la base de datos
try {
    $conn = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BD, USUARIO, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btnAccion'])) {
        $accion = $_POST['btnAccion'];
        if ($accion === 'incrementar') {
            $indice = $_POST['indice'];

            // Obtener el ID del producto y la cantidad en el carrito
            $id_inventario = $_SESSION['CARRITO'][$indice]['INVENTARIO'];
            $cantidad_en_carrito = $_SESSION['CARRITO'][$indice]['CANTIDAD'];

            // Consultar la cantidad existente en el inventario
            $sql_cantidad_inventario = "SELECT pr_CantidadExistentes FROM inventario WHERE id_inventario = ?";
            $stmt_cantidad_inventario = $conn->prepare($sql_cantidad_inventario);
            $stmt_cantidad_inventario->execute([$id_inventario]);
            $cantidad_disponible = $stmt_cantidad_inventario->fetchColumn();

            // Verificar si hay suficientes productos en el inventario
            if ($cantidad_en_carrito + 1 <= $cantidad_disponible) {
                // Incrementar la cantidad en el carrito
                $_SESSION['CARRITO'][$indice]['CANTIDAD']++;

                // Realizar cálculos
                $product = $_SESSION['CARRITO'][$indice];
                $subtotal = $product['PRECIO'] * $product['CANTIDAD'];
                $subtotal = $subtotal / 1.16;
                $iva = $subtotal * 0.16;
                $total = $subtotal + $iva;

                // Actualizar datos en la sesión
                $_SESSION['CARRITO'][$indice]['SUBTOTAL'] = $subtotal;
                $_SESSION['CARRITO'][$indice]['IVA'] = $iva;
                $_SESSION['CARRITO'][$indice]['TOTAL'] = $total;

                // Actualizar la cantidad y otros datos en la tabla carrito en la base de datos
                $nueva_cantidad = $_SESSION['CARRITO'][$indice]['CANTIDAD'];

                $sql_actualizar = "UPDATE carrito SET cantidad = ?, subtotal = ?, iva = ?, total = ? WHERE id_inventario = ?";
                $stmt_actualizar = $conn->prepare($sql_actualizar);
                $stmt_actualizar->bindValue(1, $nueva_cantidad);
                $stmt_actualizar->bindValue(2, $subtotal);
                $stmt_actualizar->bindValue(3, $iva);
                $stmt_actualizar->bindValue(4, $total);
                $stmt_actualizar->bindValue(5, $id_inventario);
                $stmt_actualizar->execute();
            } else {
                echo "<script>alert('No hay suficientes productos en el inventario');</script>";
            }
        } elseif ($accion === 'decrementar') {
            $indice = $_POST['indice'];
            if ($_SESSION['CARRITO'][$indice]['CANTIDAD'] > 1) {
                $_SESSION['CARRITO'][$indice]['CANTIDAD']--;

                // Realizar cálculos y actualizar datos en la sesión
                $product = $_SESSION['CARRITO'][$indice];
                $subtotal = $product['PRECIO'] * $product['CANTIDAD'];
                $subtotal = $subtotal / 1.16;
                $iva = $subtotal * 0.16;
                $total = $subtotal + $iva;

                // Actualizar datos en la sesión
                $_SESSION['CARRITO'][$indice]['SUBTOTAL'] = $subtotal;
                $_SESSION['CARRITO'][$indice]['IVA'] = $iva;
                $_SESSION['CARRITO'][$indice]['TOTAL'] = $total;

                // Actualizar la cantidad y otros datos en la tabla carrito en la base de datos
                $id_inventario = $_SESSION['CARRITO'][$indice]['INVENTARIO'];
                $nueva_cantidad = $_SESSION['CARRITO'][$indice]['CANTIDAD'];

                $sql_actualizar = "UPDATE carrito SET cantidad = ?, subtotal = ?, iva = ?, total = ? WHERE id_inventario = ?";
                $stmt_actualizar = $conn->prepare($sql_actualizar);
                $stmt_actualizar->bindValue(1, $nueva_cantidad);
                $stmt_actualizar->bindValue(2, $subtotal);
                $stmt_actualizar->bindValue(3, $iva);
                $stmt_actualizar->bindValue(4, $total);
                $stmt_actualizar->bindValue(5, $id_inventario);
                $stmt_actualizar->execute();
            }
        }
        // ... (resto del código)
    }
}

// Resto del código HTML y la tabla del carrito aquí...
?>


<br>
<h3>Lista del carrito</h3>
<?php if (!empty($_SESSION['CARRITO'])) { ?>
    <table class="table table-light table-bordered">
        <tbody>
            <tr>
                <th width="40%">Descripción</th>
                <th width="15%" class="text-center">Cantidad</th>
                <th width="20%" class="text-center">Precio</th>
                <th width="20%" class="text-center">Total</th>
                <th width="5%">Eliminar</th>
            </tr>
            <?php $subtotal = 0; ?>
            <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                <tr>
                    <td width="40%"><?php echo $producto['NOMBRE'] ?></td>
                    <td width="15%" class="text-center">
                        <form action="" method="post">
                            <input type="hidden" name="indice" value="<?php echo $indice; ?>">
                            <button class="btn btn-outline-primary" type="submit" name="btnAccion" value="incrementar">+</button>
                            <?php echo $producto['CANTIDAD'] ?>
                            <button class="btn btn-outline-primary" type="submit" name="btnAccion" value="decrementar">-</button>
                        </form>
                    </td>
                    <td width="20%" class="text-center"><?php echo $producto['PRECIO'] ?></td>
                    <?php $subtotalProducto = $producto['PRECIO'] * $producto['CANTIDAD']; ?>
                    <td width="20%" class="text-center"><?php echo number_format($subtotalProducto, 2); ?></td>
                    <td width="5%">
                        <form action="" method="post">
                            <input type="hidden" name="id_inventario" id="id_inventario" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                            <button class="btn btn-outline-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php $subtotal += $subtotalProducto; ?>
            <?php } ?>
            <tr>
                <td colspan="3" align="right"><h3>Subtotal</h3></td>
                <td align="right"><h3>$<?php echo number_format($subtotal/1.16, 2); ?></h3></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" align="right"><h3>IVA</h3></td>
                <td align="right"><h3>$<?php echo number_format(($subtotal/1.16)*0.16, 2); ?></h3></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" align="right"><h3>Total</h3></td>
                <td align="right"><h3>$<?php echo number_format($subtotal, 2); ?></h3></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5">
                    <form action="cliente.php" method="post">
                        <div class="alert alert-success">
                            <div class="form-group">
                                <!-- Campos del formulario -->
                                <label for="nombre">NOMBRE:</label>
                                <input id="nombre" name="nombre" class="form-control" type="text" placeholder="Por favor escribe tu nombre" required>
                                
                                <label for="apellido_paterno">APELLIDO PATERNO:</label>
                                <input id="apellido_paterno" name="apellido_paterno" class="form-control" type="text" placeholder="Por favor escribe tu apellido paterno" required>

                                <label for="apellido_materno">APELLIDO MATERNO:</label>
                                <input id="apellido_materno" name="apellido_materno" class="form-control" type="text" placeholder="Por favor escribe tu apellido materno" required>

                                <label for="telefono">NUMERO DE TELEFONO:</label>
                                <input id="telefono" name="telefono" class="form-control" type="text" placeholder="Por favor escribe tu numero de telefono" required>

                                <label for="correo">CORREO DE CONTACTO:</label>
                                <input id="correo" name="correo" class="form-control" type="email" placeholder="Por favor escribe tu correo" required>

                                <label for="direccion">DIRECCION:</label>
                                <input id="direccion" name="direccion" class="form-control" type="text" placeholder="Por favor escribe tu direccion" required>
                            </div>
                            <small id="emailHelp" class="form-text text-muted">
                                Los productos se enviarán a esta dirección.
                            </small>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder"  method="post">
                            Proceder al pago >>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
<?php
} else {
?>
    <div class="alert alert-success">
        No hay productos en el carrito...
    </div>
<?php
}
?>