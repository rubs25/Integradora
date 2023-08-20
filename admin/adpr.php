<?php
// agregar_producto.php

// Datos de conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = 'Rubas2509';
$database = 'integradora4';

// Establecer conexión
$conn = mysqli_connect($host, $user, $password, $database) or die('Error al conectar con la base de datos: ' . mysqli_connect_error());

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores enviados por el formulario
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Obtener información del archivo de imagen
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];

    // Ruta de la carpeta de destino para guardar la imagen
    $uploadDir = "images/"; // Usar barras normales

    // Validar que se haya seleccionado un archivo de imagen
    if ($imageSize > 0 && $imageError === 0) {
        // Generar un nombre único para la imagen
        $imageUniqueName = uniqid() . '_' . $imageName;

        // Ruta completa del archivo de imagen en la carpeta de destino
        $uploadPath = $uploadDir . $imageUniqueName;

        // Mover el archivo de imagen a la carpeta de destino
        if (move_uploaded_file($imageTmpName, $uploadPath)) {
            // Insertar el producto en la base de datos
            $sql = "INSERT INTO products (name, price, image) VALUES ('$name', $price, '$imageUniqueName')";
            if (mysqli_query($conn, $sql)) {
                echo "El producto se agregó correctamente.";
                // Redirigir a gestion_productos.php después de agregar el producto
                header("Location: productos.php");
                exit(); // Terminar la ejecución del script después de la redirección
            } else {
                echo "Error al agregar el producto: " . mysqli_error($conn);
            }
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "No se ha seleccionado una imagen.";
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>