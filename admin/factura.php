<?php
include '../basedatos/conexion.php';
session_start();
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 20);

$pageWidth = $pdf->GetPageWidth();

$pdf->Cell(0, 10, '', 'T');

$titleWidth = $pdf->GetStringWidth('Motors-Toys');
$titleX = ($pageWidth - $titleWidth) / 2;

$pdf->SetX($titleX);

$pdf->Cell(0, 10, '', 'T');

$pdf->SetFont('Arial', '', 12);

$numeroFactura = mt_rand(10000, 99999);

if (isset($_SESSION['cliente_id'])) {
    $clientId = $_SESSION['cliente_id'];
} else {
    die("No se proporcionó el ID del cliente.");
}

$query = "SELECT 
            v.id_venta, 
            c.cl_nombre, 
            c.cl_apellidomat, 
            c.cl_apellidopa, 
            p.name AS product_name, 
            p.price AS product_price, 
            v.fecha_venta, 
            v.hora_venta, 
            v.total 
          FROM ventas v 
          INNER JOIN clientes c ON v.id_cliente = c.id_cliente 
          INNER JOIN products p ON v.id_producto = p.id
          WHERE v.id_cliente = $clientId";

$result = mysqli_query($conexion, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $ventas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $ventas[] = $row;
    }
} else {
    die("El cliente no existe o hubo un error en la consulta.");
}

$logoX = 10;
$logoY = 10;
$signatureX = $pageWidth - 120;
$signatureY = 180;

if (file_exists('../admin/logos2.jpg')) {
    $pdf->Image('../admin/logos2.jpg', $logoX, $logoY, 40);
}

$emisorNombre = "Motors-Toys S.A. de C.V.";
$emisorDomicilio = "Calle: Prolongacion Zaragoza";
$emisorRFC = "Tel. 443-579-8078";
$emisorTelefono = "";

$pdf->SetFont('Arial', 'B', 14);
$pdf->SetXY(60, $logoY + 5);
$pdf->Cell(0, 10, $emisorNombre, 0, 1, 'L');
$pdf->SetFont('Arial', '', 12);
$pdf->SetX(60);
$pdf->Cell(0, 10, $emisorDomicilio, 0, 1, 'L');
$pdf->SetX(60);
$pdf->Cell(0, 10, $emisorRFC, 0, 1, 'L');
$pdf->SetX(60);
$pdf->Cell(0, 10, $emisorTelefono, 0, 1, 'L');

$pdf->SetFont('Arial', '', 12);
$fechaHoraCompra = date('d/m/Y H:i:s');
$pdf->Cell(0, 10, 'Fecha y Hora de la Compra:', 0, 1, 'L');
$pdf->Cell(0, 10, $fechaHoraCompra, 0, 1, 'L');

$pdf->SetXY($pageWidth - 130, $logoY + 5);
$pdf->Cell(0, 10, 'Datos del Cliente:', 0, 1, 'R');
$pdf->Cell(0, 10, 'Nombre: ' . $ventas[0]['cl_nombre'] . ' ', 0, 1, 'R');
$pdf->Cell(0, 10, 'Apellidos: ' . $ventas[0]['cl_apellidopa'] . ' ' . $ventas[0]['cl_apellidomat'], 0, 1, 'R');

$pdf->Ln(20);

$pdf->SetFillColor(255, 230, 200);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(80, 10, 'Productos', 1, 0, 'C', 1);
$pdf->Cell(40, 10, 'Precios', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Fecha', 1, 0, 'C', 1);
$pdf->Cell(40, 10, 'Subtotal', 1, 1, 'C', 1);


// ...

$pdf->SetFont('Arial', '', 12);
$subtotal = 0;
$ivaTotal = 0;
$total = 0;

foreach ($ventas as $venta) {
    $pdf->Cell(80, 10, $venta["product_name"], 1, 0, 'L');
    $pdf->Cell(40, 10, '$' . number_format($venta["product_price"], 2), 1, 0, 'C');
    $pdf->Cell(30, 10, $venta["fecha_venta"], 1, 0, 'C');

    // Calcula los valores de acuerdo a tus cálculos
    $subtotalProducto = $venta["total"] / 1.16;
    $ivaProducto = $venta["total"] - $subtotalProducto;

    $pdf->Cell(40, 10, '$' . number_format($subtotalProducto, 2), 1, 1, 'C');
    
    $subtotal += $subtotalProducto;
    $ivaTotal += $ivaProducto;
    $total += $venta["total"];
}

$pdf->SetFont('Arial', 'B', 12);

if (file_exists('../admin/logos2.jpg')) {
    $pdf->Image('../admin/logos2.jpg', $signatureX, $signatureY, 100);
}

$pdf->Cell(150, 10, 'Subtotal:', 1, 0, 'R');
$pdf->Cell(40, 10, '$' . number_format($subtotal, 2), 1, 1, 'C');

$pdf->Cell(150, 10, 'IVA:', 1, 0, 'R');
$pdf->Cell(40, 10, '$' . number_format($ivaTotal, 2), 1, 1, 'C');

$pdf->Cell(150, 10, 'Total:', 1, 0, 'R');
$pdf->Cell(40, 10, '$' . number_format($total, 2), 1, 1, 'C');

$pdf->Output();
?>

