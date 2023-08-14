<?php
require ('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,'Reporte de usuarios',0,1,'C');
        
        $this->SetFont('Arial','',12);
        $this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(60,10,'Contrasena',1,0,'C');
        $this->Cell(60,10,'Usuario',1,0,'C');
        $this->Cell(50,10,'Tipo Usuario',1,1,'C');
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
$consulta = "SELECT * FROM t_user";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(20,10,$row['id_user'],1,0,'C');
    $pdf->Cell(60,10,$row['contrasena'],1,0,'C');
    $pdf->Cell(60,10,$row['usuario'],1,0,'C');
    $pdf->Cell(50,10,$row['tipo_usuario'],1,1,'C');
}

$pdf->Output();
?>
