<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Variables para los datos de la venta
    private $clientName;
    private $invoiceDate;

    // Setter para el nombre del cliente
    public function SetClientName($clientName)
    {
        $this->clientName = $clientName;
    }

    // Setter para la fecha de la factura
    public function SetInvoiceDate($invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;
    }

    function Header()
    {
        // Agregar la imagen de la empresa
        $this->Image('logos2.jpg', 175, 10, 50);

        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, 'Factura', 0, 1, 'C');

        $this->SetFont('Arial', '', 12);
        $this->Cell(40, 10, 'Fecha:', 0);
        $this->Cell(20, 10, $this->invoiceDate, 0, 1);

        $this->Cell(40, 10, 'Cliente:', 0);
        $this->Cell(0, 10, $this->clientName, 0, 1);

        $this->Ln(10);

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(100, 10, 'Descripcion', 1, 0, 'C');
        $this->Cell(40, 10, 'Cantidad', 1, 0, 'C');
        $this->Cell(50, 10, 'Precio', 1, 0, 'C');
        $this->Cell(50, 10, 'Subtotal', 1, 1, 'C');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . ' de {nb}', 0, 0, 'C');
    }
}

// Comenzar la sesión si no ha sido iniciada
session_start();

// Verificar si el carrito está definido y no está vacío
if (isset($_SESSION['CARRITO']) && count($_SESSION['CARRITO']) > 0) {
    // Inicializar el array de items
    $items = array();

    // Recorrer todos los productos en el carrito
    foreach ($_SESSION['CARRITO'] as $producto) {
        $descripcion = $producto['NOMBRE'];
        $cantidad = $producto['CANTIDAD'];
        $precio = $producto['PRECIO'];
        $subtotal = $cantidad * $precio;

        // Agregar el item al array de items
        $items[] = array(
            $descripcion,
            $cantidad,
            $precio,
            $subtotal
        );
    }
} 

$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Obtener los datos de la venta
$fecha = date('d/m/Y');
$cliente = 'Nombre del Cliente';

// Establecer los datos en el objeto $pdf
$pdf->SetClientName($cliente);
$pdf->SetInvoiceDate($fecha);

// Agregar los items al detalle de la venta
foreach ($items as $item) {
    $descripcion = $item[0];
    $cantidad = $item[1];
    $precio = $item[2];
    $subtotal = $item[3];

    $pdf->Cell(100, 10, $descripcion, 1, 0, 'C');
    $pdf->Cell(40, 10, $cantidad, 1, 0, 'C');
    $pdf->Cell(50, 10, number_format($precio, 2), 1, 0, 'C');
    $pdf->Cell(50, 10, number_format($subtotal, 2), 1, 1, 'C');
}

// Generar el contenido del PDF
$pdf->Output('factura.pdf', 'D');