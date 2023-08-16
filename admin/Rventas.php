<?php
require ('fpdf/fpdf.php');


class PDF extends FPDF
{
    function Header()
{
    $this->SetFont('Arial','B',15);
    $this->Cell(0,10,'Reporte de ventas',0,1,'C');
    $this->Cell(0,10,'Fecha del reporte: '.date('d/m/Y'),0,1,'C');

    $this->SetFont('Arial','',12);
    $this->Cell(20,10,'ID',1,0,'C');
    $this->Cell(30,10,'Fecha',1,0,'C');
    $this->Cell(40,10,'Hora',1,0,'C');
    $this->Cell(40,10,'Cantidad',1,0,'C');
    $this->Cell(30,10,'Iva',1,0,'C');
    $this->Cell(30,10,'Total',1,0,'C');
    $this->Cell(40,10,'Metodo',1,0,'C');
    $this->Cell(50,10,'Descuento',1,1,'C');
}

    
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

require 'cone.php';
$consulta = "SELECT * FROM ventas";
$resultado = $mysqli->query($consulta);

$pdf = new PDF('L'); // 'L' indica formato horizontal
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$totalGeneral = 0;

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(20,10,$row['id_venta'],1,0,'C');
    $pdf->Cell(30,10,$row['ve_fechaventa'],1,0,'C');
    $pdf->Cell(40,10,$row['ve_horaventa'],1,0,'C');
    $pdf->Cell(40,10,$row['ve_cantidadprod'],1,0,'C');
    $pdf->Cell(30,10,$row['ve_iva'],1,0,'C');
    $pdf->Cell(30,10,$row['ve_total'],1,0,'C');
    $pdf->Cell(40,10,$row['ve_metodopago'],1,0,'C');
    $pdf->Cell(50,10,$row['descuento_aplicado'],1,1,'C');
    
    $totalGeneral += $row['ve_total'];
}

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Total general: ' . $totalGeneral,0,1,'R');

$pdf->Output();
?>