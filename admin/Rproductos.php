<?php
require ('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,'Reporte de productos',0,1,'C');
        
        $this->SetFont('Arial','',12);
        $this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(60,10,'Nombre',1,0,'C');
        $this->Cell(30,10,'Producto',1,0,'C');
        $this->Cell(20,10,'Cantidad',1,0,'C');
        $this->Cell(20,10,'Sucursal',1,0,'C');
        $this->Cell(20,10,'Precio',1,1,'C');
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
$consulta = "SELECT * FROM inventario";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage(); // Formato horizontal
$pdf->SetFont('Arial','',12);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(20,10,$row['id_inventario'],1,0,'C');
    $pdf->Cell(60,10,$row['pr_nombre'],1,0,'C');
    $pdf->Cell(30,10,$row['id_producto'],1,0,'C');
    $pdf->Cell(20,10,$row['pr_CantidadExistentes'],1,0,'C');
    $pdf->Cell(20,10,$row['id_sucursal'],1,0,'C');
    $pdf->Cell(20,10,$row['pr_Precio_U_Venta'],1,1,'C');
}

$pdf->Output();
?>
