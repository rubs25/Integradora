<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo '
      <script>
        alert("Debes de iniciar sesion");
        window.location = "inicio.php";
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
    <title>PAGINA DE INICIO</title>
</head>
<body>
    <h1>Bienvenido <?= $_SESSION['usuario']; ?></h1>
    <a href="inicio.php"> Cerrar Sesion</a>
</body>
</html>