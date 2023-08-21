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
        $this->Cell(30,10,'Cliente',1,0,'C');
        $this->Cell(40,10,'Fecha',1,0,'C');
        $this->Cell(40,10,'Hora',1,0,'C');
        $this->Cell(30,10,'Total',1,0,'C');
        $this->Cell(30,10,'Sucursal',1,1,'C'); // Changed 'C' to '1' for new line
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

require 'cone.php'; // Asegúrate de tener este archivo con la conexión a la base de datos
$consulta = "SELECT * FROM ventas";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$totalGeneral = 0;

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(20,10,$row['id_venta'],1,0,'C');
    $pdf->Cell(30,10,$row['id_cliente'],1,0,'C');
    $pdf->Cell(40,10,$row['fecha_venta'],1,0,'C');
    $pdf->Cell(40,10,$row['hora_venta'],1,0,'C');
    $pdf->Cell(30,10,$row['total'],1,0,'C');
    $pdf->Cell(30,10,$row['id_sucursal'],1,1,'C'); // Changed 'C' to '1' for new line
    
    $totalGeneral += $row['total'];
}

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Total general: ' . $totalGeneral,0,1,'R');

$pdf->Output();
?>
