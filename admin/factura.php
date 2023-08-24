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

//$query = "SELECT * FROM t_user WHERE usuario = usuario";

if (isset($_SESSION['cliente_id'])) {
    $clientId = $_SESSION['cliente_id'];
   
} else {
    die("No se proporcionó el ID del cliente.");
}

$query = "SELECT cl_nombre, cl_apellidopa, cl_direccion, null as cl_regimenFiscal FROM clientes WHERE id_cliente = $clientId";
$result = mysqli_query($conexion, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $clientData = mysqli_fetch_assoc($result);
    $clientName = $clientData['cl_nombre'];
    $clientLastName = $clientData['cl_apellidopa'];
    $clientAddress = $clientData['cl_direccion'];
    $clientFisical = $clientData['cl_regimenFiscal'];
    
} else {
    die("El cliente no existe o hubo un error en la consulta.");
}

function obtenerProductosCarrito($conexion, $clienteId)
{
    $query = "SELECT p.pr_Nombre, p.pr_Precio_U_Venta, d.det_cantidad
              FROM products p
              INNER JOIN tdetalle_venta d ON p.id_producto = d.det_producto
              WHERE d.det_cliente = $clienteId";

    $result = mysqli_query($conexion, $query);

    $productos = array();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $productos[] = array(
                "Nombre" => $row['pr_Nombre'],
                "Precio" => $row['pr_Precio_U_Venta'],
                "Cantidad" => $row['det_cantidad'],
            );
        }
    }

    return $productos;
}

// Obtener los productos del carrito para el cliente actual
$cartItems = obtenerProductosCarrito($conexion, $clientId);

$ivaPorcentaje = 16;

// Obtener el tipo de cliente desde la base de datos
$query = "SELECT id_cliente FROM clientes WHERE id_cliente = $clientId";
$result = mysqli_query($conexion, $query);

$logoX = 10;
$logoY = 10;
$signatureX = $pageWidth - 120;
$signatureY = 180;

if (file_exists('../img/logo.jpg')) {
    $pdf->Image('../img/logo.jpg', $logoX, $logoY, 40);
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

$pdf->Cell(0, 10, 'Numero de Factura: ' . $numeroFactura, 0, 1, 'L');

$pdf->SetXY($pageWidth - 130, $logoY + 5);
$pdf->Cell(0, 10, 'Datos del Cliente:', 0, 1, 'R');
$pdf->Cell(0, 10, 'Nombre: ' . $clientName . ' ' . $clientLastName, 0, 1, 'R');
$pdf->Cell(0, 10, 'Direccion:', 0, 1, 'R');
$pdf->Cell(0, 10, $clientAddress, 0, 1, 'R');

$pdf->Ln(20);

$pdf->SetFillColor(200, 220, 255);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(80, 10, 'Productos', 1, 0, 'C', 1);
$pdf->Cell(40, 10, 'Precios', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Cantidades', 1, 0, 'C', 1);
$pdf->Cell(40, 10, 'Subtotal', 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 12);
$subtotal = 0;
foreach ($cartItems as $item) {
    $importe = $item["Precio"] * $item["Cantidad"];
    $subtotal += $importe;

    $pdf->Cell(80, 10, $item["Nombre"], 1, 0, 'L');
    $pdf->Cell(40, 10, '$ ' . number_format($item["Precio"], 2), 1, 0, 'C');
    $pdf->Cell(30, 10, $item["Cantidad"], 1, 0, 'C');
    $pdf->Cell(40, 10, '$ ' . number_format($importe, 2), 1, 1, 'C');
}
 
$pdf->SetFont('Arial', 'B', 12);

if (file_exists('../img/Limpia-Express_cocosign.png')) {
    $pdf->Image('../img/Limpia-Express_cocosign.png', $signatureX, $signatureY, 100);
}

$pdf->Output();