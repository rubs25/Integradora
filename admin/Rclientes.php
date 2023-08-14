<?php
require ('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,'Reporte de clientes',0,1,'C');
        
        $this->SetFont('Arial','',12);
        $this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(30,10,'Nombre',1,0,'C');
        $this->Cell(40,10,'Apellido Materno',1,0,'C');
        $this->Cell(40,10,'Apellido Paterno',1,0,'C');
        $this->Cell(30,10,'DNI',1,0,'C');
        $this->Cell(30,10,'Teléfono',1,0,'C');
        $this->Cell(40,10,'Correo',1,0,'C');
        $this->Cell(50,10,'Dirección',1,1,'C');
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
$consulta = "SELECT * FROM clientes";
$resultado = $mysqli->query($consulta);

$pdf = new PDF('L'); // 'L' indica formato horizontal
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(20,10,$row['id_cliente'],1,0,'C');
    $pdf->Cell(30,10,$row['cl_nombre'],1,0,'C');
    $pdf->Cell(40,10,$row['cl_apellidomat'],1,0,'C');
    $pdf->Cell(40,10,$row['cl_apellidopa'],1,0,'C');
    $pdf->Cell(30,10,$row['cl_dni'],1,0,'C');
    $pdf->Cell(30,10,$row['cl_numtelefono'],1,0,'C');
    $pdf->Cell(40,10,$row['cl_correo'],1,0,'C');
    $pdf->Cell(50,10,$row['cl_direccion'],1,1,'C');
}

$pdf->Output();
?>
