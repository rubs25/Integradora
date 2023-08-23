<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #3a3838;
            color: #fefefe;
        }

        h1,
        h2 {
            text-align: center;
            color: #fefefe;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #fefefe;
            vertical-align: middle;
        }

        th {
            background-color: #73d8a7;
            font-weight: bold;
        }

        td {
            background-color: #0909097e;
            padding-left: 10px;
            padding-right: 10px;
        }

        .btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            animation: button-glow 1.5s ease-in-out infinite alternate;
            text-align: center;
        }

        .btn:hover {
            background-color: #52c756;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #73d8a7;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .modal h2 {
            margin-top: 0;
        }

        .modal form {
            display: flex;
            flex-direction: column;
        }

        .modal label {
            margin-top: 10px;
            color: #fff;
        }

        .modal select,
        .modal input[type="number"] {
            padding: 5px;
            font-size: 16px;
        }

        .modal input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .modal input[type="submit"]:hover {
            background-color: #45a049;
        }

        @keyframes button-glow {
            0% {
                box-shadow: 0 0 5px #4CAF50;
            }

            100% {
                box-shadow: 0 0 20px #4CAF50;
            }
        }
    </style>
</head>

<body>
    <?php
    // Conexión a la base de datos
    $conn = mysqli_connect('localhost', 'root', '123456', 'integradora') or die('Error al conectar con la base de datos: ' . mysqli_connect_error());

    // Obtener los productos disponibles
    $query_productos = "SELECT * FROM products";
    $result_productos = mysqli_query($conn, $query_productos);

    // Obtener las sucursales disponibles
    $query_sucursales = "SELECT * FROM sucursales";
    $result_sucursales = mysqli_query($conn, $query_sucursales);
    ?>

    <a href="administrador.php" class="btn">Regresar</a>

    <h1>Gestión de Inventario</h1>
    <h2>Agregar al Inventario</h2>

    <form action="adp.php" method="POST" class="formulario">
        <label for="id_producto">Producto:</label>
        <select id="id_producto" name="id_producto" required>
            <?php
            // Mostrar los productos en el menú desplegable
            while ($row_producto = mysqli_fetch_assoc($result_productos)) {
                echo "<option value='" . $row_producto['id'] . "'>" . $row_producto['name'] . "</option>";
            }
            ?>
        </select>

        <label for="pr_CantidadExistentes">Cantidad Existentes:</label>
        <input type="number" id="pr_CantidadExistentes" name="pr_CantidadExistentes" required>

        <label for="id_sucursal">Sucursal:</label>
    <select id="id_sucursal" name="id_sucursal" required>
        <?php
        // Mostrar las sucursales en el menú desplegable
        while ($row_sucursal = mysqli_fetch_assoc($result_sucursales)) {
            echo "<option value='" . $row_sucursal['id_Sucursal'] . "'>" . $row_sucursal['dp_nombre'] . "</option>";
        }
        ?>
    </select>
        <input type="submit" name="alta" class="btn btn-primary">
        
    <div class="text-right">
                <a href="../admin/Rinventario.php?id=<?php echo $row['id']?>" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i> Generar Reporte</a>
              </div>
    </form>

    <h2>Productos en el Inventario</h2>
    <table>
        <thead>
            <tr>
                <th>ID Producto</th>
                <th>Nombre Producto</th>
                <th>Cantidad Existente</th>
                <th>ID Sucursal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
// Obtener los productos en el inventario
$query_inventario = "SELECT * FROM inventario";
$result_inventario = mysqli_query($conn, $query_inventario);

while ($row_inventario = mysqli_fetch_assoc($result_inventario)) {
    echo "<tr>";
    echo "<td>" . $row_inventario['id_producto'] . "</td>";
    echo "<td>" . obtenerNombreProducto($row_inventario['id_producto']) . "</td>";
    echo "<td>" . $row_inventario['pr_CantidadExistentes'] . "</td>";
    echo "<td>" . $row_inventario['id_sucursal'] . "</td>";
    echo "<td><a href='editarinventario.php?id=" . $row_inventario['id_inventario'] . "'>Editar</a></td>";
    echo "<td><a href='eliminarinventario.php?id=" . $row_inventario['id_inventario'] . "' class='eliminar' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este producto?\")'>Eliminar</a></td>";
    
    echo "</tr>";
    
}


// Función para obtener el nombre del producto
function obtenerNombreProducto($id_producto) {
    global $conn;
    $query_nombre = "SELECT name FROM products WHERE id = $id_producto";
    $result_nombre = mysqli_query($conn, $query_nombre);
    $row_nombre = mysqli_fetch_assoc($result_nombre);
    return $row_nombre['name'];
}
?>
        </tbody>
    </table>

    <script>
        var openModalAddBtn = document.getElementById('openModalAdd');
        var modalAdd = document.getElementById('modalAdd');

        openModalAddBtn.addEventListener('click', function () {
            modalAdd.style.display = 'block';
        });

        modalAdd.addEventListener('click', function (event) {
            if (event.target === modalAdd) {
                modalAdd.style.display = 'none';
            }
        });
    </script>
</body>

</html>