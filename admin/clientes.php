<?php 
include('conecction.php');

// Manejar el formulario de agregar
if (isset($_POST['alta'])) {
    $cl_nombre = $_POST['cl_nombre'];
    $cl_apellidomat = $_POST['cl_apellidomat'];
    $cl_apellidopa = $_POST['cl_apellidopa'];
    $cl_numtelefono = $_POST['cl_numtelefono'];
    $cl_correo = $_POST['cl_correo'];
    $cl_direccion = $_POST['cl_direccion'];

    $query_alta = "INSERT INTO clientes (cl_nombre, cl_apellidomat, cl_apellidopa, cl_numtelefono, cl_correo, cl_direccion) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $query_alta);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssss", $cl_nombre, $cl_apellidomat, $cl_apellidopa, $cl_numtelefono, $cl_correo, $cl_direccion);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        echo 'Error al preparar la consulta de alta: ' . mysqli_error($conexion);
    }
}

// Obtener la lista de clientes
$query_clientes = "SELECT * FROM clientes";
$result_clientes = mysqli_query($conexion, $query_clientes);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Gestión de Clientes</title>
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
    <div class="header">
        <h1 class="titulo">Panel de Administración</h1>
        <p class="subtitulo">Gestión de Clientes</p>
    </div>

    <div class="container">
        <h2>Agregar Cliente</h2>
        <form action="alta.php" method="POST" class="formulario">
            <label for="cl_nombre">Nombre:</label>
            <input type="text" id="cl_nombre" name="cl_nombre" required>

            <label for="cl_apellidomat">Apellido Paterno:</label>
            <input type="text" id="cl_apellidomat" name="cl_apellidomat" required>

            <label for="cl_apellidopa">Apellido Materno:</label>
            <input type="text" id="cl_apellidopa" name="cl_apellidopa" required>

            <label for="cl_numtelefono">Número de Teléfono:</label>
            <input type="tel" id="cl_numtelefono" name="cl_numtelefono">

            <label for="cl_correo">Correo:</label>
            <input type="email" id="cl_correo" name="cl_correo" required>

            <label for="cl_direccion">Dirección:</label>
            <textarea id="cl_direccion" name="cl_direccion"></textarea>

            <input type="submit" name="alta" class="btn btn-primary" value="Agregar">
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Número de Teléfono</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($row = mysqli_fetch_assoc($result_clientes)) { ?> 
                    <tr>
                        <td><?php echo $row['cl_nombre']; ?></td>
                        <td><?php echo $row['cl_apellidomat']; ?></td>
                        <td><?php echo $row['cl_apellidopa']; ?></td>
                        <td><?php echo $row['cl_numtelefono']; ?></td>
                        <td><?php echo $row['cl_correo']; ?></td>
                        <td><?php echo $row['cl_direccion']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['id_cliente']?>" class="btn-secondary">Editar</a>
                            <a href="eliminar.php?id=<?php echo $row['id_cliente']?>" class="btn btn-secondary" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?')">Eliminar</a>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>

</html>