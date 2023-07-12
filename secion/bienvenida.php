<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo '
      <script>
        alert("Inicia sesion");
        window.location = "index.php";
      </script>
    ';

    session_destroy();

    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body>
    <h1>Bienvenida</h1>
    <a href="/cerrar_sesion.php"> Cerrar Sesion</a>
</body>
</html>