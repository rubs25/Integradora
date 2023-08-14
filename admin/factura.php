<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        // Agregar la imagen de la empresa
        $this->Image('logos2.jpg', 175, 10, 50);
        
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,'Factura',0,1,'C');
        
        $this->SetFont('Arial','',12);
        $this->Cell(40,10,'Fecha:',0);
        $this->Cell(20,10,date('d/m/Y'),0,1);
        
        $this->Cell(40,10,'Cliente:',0);
        $this->Cell(0,10,'Nombre del Cliente',0,1);
        
        $this->Ln(10);
        
        $this->SetFont('Arial','B',12);
        $this->Cell(100,10,'Descripcion',1,0,'C');
        $this->Cell(40,10,'Cantidad',1,0,'C');
        $this->Cell(50,10,'Precio',1,0,'C');
        $this->Cell(50,10,'Subtotal',1,1,'C');
    }
    
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$items = array(
    array('Producto 1', 2, 10.00),
    array('Producto 2', 3, 15.00),
    array('Producto 3', 1, 20.00)
);

$total = 0;

foreach ($items as $item) {
    $descripcion = $item[0];
    $cantidad = $item[1];
    $precio_unitario = $item[2];
    $subtotal = $cantidad * $precio_unitario;
    
    $pdf->Cell(100,10,$descripcion,1,0,'C');
    $pdf->Cell(40,10,$cantidad,1,0,'C');
    $pdf->Cell(50,10,number_format($precio_unitario, 2),1,0,'C');
    $pdf->Cell(50,10,number_format($subtotal, 2),1,1,'C');
    
    $total += $subtotal;
}

$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,'Total:',1,0,'R');
$pdf->Cell(50,10,number_format($total, 2),1,1,'C');

$pdf->Output();
?>
