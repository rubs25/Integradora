<?php
require('fpdf/fpdf.php');

// Obtener los datos de la tabla de detalles de ventas
$servername = "localhost";
$username = "root";
$password = "Rubas2509";
$dbname = "integradora2";

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear una instancia de la clase FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Establecer la fuente y el estilo del encabezado
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,'Facturación',0,1,'C');

// Establecer la fuente y el estilo del contenido
$pdf->SetFont('Arial','',12);

// Consulta a la tabla de detalles de ventas
$sql = "SELECT nombre_producto, cantidad, precio, subtotal FROM detalles_ventas";
$result = $conn->query($sql);

// Verificar si hay registros en la tabla
if ($result->num_rows > 0) {
    // Crear la cabecera de la tabla
    $pdf->Cell(60,10,'Nombre del Producto',1,0,'C');
    $pdf->Cell(40,10,'Cantidad',1,0,'C');
    $pdf->Cell(40,10,'Precio',1,0,'C');
    $pdf->Cell(50,10,'Subtotal',1,1,'C');

    // Mostrar los datos de la tabla
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(60,10,$row['nombre_producto'],1,0,'C');
        $pdf->Cell(40,10,$row['cantidad'],1,0,'C');
        $pdf->Cell(40,10,$row['precio'],1,0,'C');
        $pdf->Cell(50,10,$row['subtotal'],1,1,'C');
    }
} else {
    // No se encontraron registros en la tabla
    $pdf->Cell(0,10,'No se encontraron detalles de ventas.',0,1,'C');
}

// Cerrar la conexión a la base de datos
$conn->close();

// Salida del archivo PDF
$pdf->Output('facturacion.pdf', 'D');
?>