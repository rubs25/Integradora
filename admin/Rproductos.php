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
        $this->Cell(20,10,'Fecha: ' . date('Y-m-d'), 0, 0, 'L'); // Agregar la fecha
        $this->Ln();
        $this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(40,10,'Nombre',1,0,'C');
        $this->Cell(20,10,'Precio',1,0,'C');
        $this->Cell(100,10,'Imagen',1,1,'C');
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
$consulta = "SELECT * FROM products";
$resultado = $mysqli->query($consulta);

if ($resultado) {
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage(); // Formato horizontal
    $pdf->SetFont('Arial','',12);

    while ($row = $resultado->fetch_assoc()) {
        $pdf->Cell(20,10,$row['id'],1,0,'C');
        $pdf->Cell(40,10,$row['name'],1,0,'C');
        $pdf->Cell(20,10,$row['price'],1,0,'C');
        $pdf->Cell(100,10,$row['image'],1,0,'C'); // Cambio en este Cell
        $pdf->Ln(); // Agregar un salto de línea después de cada fila
    }

    $pdf->Output();
} else {
    echo "Error: " . $mysqli->error;
}
?>
