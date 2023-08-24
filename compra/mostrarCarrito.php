<?php
include 'config.php';
include 'carrito.php';
include 'cabecera.php';

$host = "localhost";
$usuario = "root";
$contraseña = "Rubas2509";
$base_de_datos = "integradora4";

$conn = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btnAccion'])) {
        $accion = $_POST['btnAccion'];
        if ($accion === 'incrementar') {
            $indice = $_POST['indice'];
            $_SESSION['CARRITO'][$indice]['CANTIDAD']++;

            // Obtener el ID del producto desde el carrito de sesiones
            $productoId = $_SESSION['CARRITO'][$indice]['ID'];

            // Actualizar la cantidad en la base de datos
            $sql = "UPDATE inventario SET pr_CantidadExistentes = pr_CantidadExistentes + 1 WHERE id_producto = id_producto";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam('id_producto', $productoId);
            $stmt->execute();
        } elseif ($accion === 'decrementar') {
            $indice = $_POST['indice'];
            if ($_SESSION['CARRITO'][$indice]['CANTIDAD'] > 1) {
                $_SESSION['CARRITO'][$indice]['CANTIDAD']--;

                // Obtener el ID del producto desde el carrito de sesiones
                $productoId = $_SESSION['CARRITO'][$indice]['ID'];

                // Actualizar la cantidad en la base de datos
                $sql = "UPDATE inventario SET pr_CantidadExistentes = pr_CantidadExistentes - 1 WHERE id_producto = id_producto";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam('id_producto', $productoId);
                $stmt->execute();
            }
        }
    }
}
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

                                <label for="apellido_materno">APELLIDO MATERNO:</label>
                                <input id="apellido_materno" name="apellido_materno" class="form-control" type="text" placeholder="Por favor escribe tu apellido materno" required>

                                <label for="apellido_paterno">APELLIDO PATERNO:</label>
                                <input id="apellido_paterno" name="apellido_paterno" class="form-control" type="text" placeholder="Por favor escribe tu apellido paterno" required>

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


