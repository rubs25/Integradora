<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #3a3838;
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
            color: #fefefe;
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

        .modal input[type="text"],
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
    // config.php

    // Datos de conexión a la base de datos
    $host = 'localhost';
    $user = 'root';
    $password = 'Rubas2509';
    $database = 'integradora4';

    // Establecer conexión
    $conn = mysqli_connect($host, $user, $password, $database) or die('Error al conectar con la base de datos: ' . mysqli_connect_error());
    

    // Obtener los productos de la base de datos
    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);
    ?>

    <a href="administrador.php" class="btn">Regresar</a>

    <h1>Gestión de Productos</h1>
    <h2>Listado de Productos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Mostrar los productos en la tabla
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['image'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <button class="btn" id="openModalAdd">Agregar Producto</button>
    <button class="btn" id="openModalUpdate">Actualizar Producto</button>
    <button class="btn" id="openModalDelete">Eliminar Producto</button>

    <div class="modal" id="modalAdd">
    <div class="modal-content">
        <h2>Agregar Producto</h2>
        <form action="adpr.php" method="post" enctype="multipart/form-data">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="price">Precio:</label>
            <input type="number" id="price" name="price" required><br><br>
            <label for="image">Imagen:</label>
            <input type="file" id="image" name="image" required><br><br>
            <input type="submit" value="Agregar Producto">
        </form>
    </div>
</div>

<div class="modal" id="modalUpdate">
        <div class="modal-content">
            <h2>Actualizar Producto</h2>
            <form action="actualizar_productos.php" method="post">
                <label for="id">ID del Producto:</label>
                <input type="number" id="id" name="id" required><br><br>
                <label for="new_price">Nuevo Precio:</label>
                <input type="number" id="new_price" name="new_price" required><br><br>
                <input type="submit" value="Actualizar Producto">
            </form>
        </div>
    </div>

    <div class="modal" id="modalDelete">
        <div class="modal-content">
            <h2>Eliminar Producto</h2>
            <form action="eliminar_productos.php" method="post">
                <label for="delete_id">ID del Producto:</label>
                <input type="number" id="delete_id" name="delete_id" required><br><br>
                <input type="submit" value="Eliminar Producto">
            </form>
        </div>
    </div>
    <div class="text-right">
                <a href="../admin/Rproductos.php?id=<?php echo $row['id']?>" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i> Generar Reporte</a>
              </div>


    <script>
        var openModalAddBtn = document.getElementById('openModalAdd');
        var openModalUpdateBtn = document.getElementById('openModalUpdate');
        var openModalDeleteBtn = document.getElementById('openModalDelete');
        var modalAdd = document.getElementById('modalAdd');
        var modalUpdate = document.getElementById('modalUpdate');
        var modalDelete = document.getElementById('modalDelete');

        openModalAddBtn.addEventListener('click', function () {
            modalAdd.style.display = 'block';
        });

        openModalUpdateBtn.addEventListener('click', function () {
            modalUpdate.style.display = 'block';
        });

        openModalDeleteBtn.addEventListener('click', function () {
            modalDelete.style.display = 'block';
        });

        modalAdd.addEventListener('click', function (event) {
            if (event.target === modalAdd) {
                modalAdd.style.display = 'none';
            }
        });

        modalUpdate.addEventListener('click', function (event) {
            if (event.target === modalUpdate) {
                modalUpdate.style.display = 'none';
            }
        });

        modalDelete.addEventListener('click', function (event) {
            if (event.target === modalDelete) {
                modalDelete.style.display = 'none';
            }
        });
    </script>
</body>

</html>