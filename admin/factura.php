<?php
require ('fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('logos2.jpg',60,160,90);
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,'Factura',0,1,'C');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF('P'); // Cambiado a formato vertical 'P'
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$servername = "localhost";
$username = "root";
$password = "Rubas2509";
$dbname = "integradora2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM ventas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $total = 0;

    while($row = $result->fetch_assoc()) {
        $pdf->Cell(0,10,'Descripcion: ' . $row["id_venta"],0,1,'L');
        $pdf->Cell(0,10,'Fecha: ' . $row["ve_fechaventa"],0,1,'L');
        $pdf->Cell(0,10,'Hora: ' . $row["ve_horaventa"],0,1,'L');
        $pdf->Cell(0,10,'Cantidad: ' . $row["ve_cantidadprod"],0,1,'L');
        $pdf->Cell(0,10,'Iva: ' . $row["ve_iva"],0,1,'L');
        $pdf->Cell(0,10,'Subtotal: ' . $row["ve_subtotal"],0,1,'L');
        $pdf->Cell(0,10,'Metodo: ' . $row["ve_metodopago"],0,1,'L');
        $pdf->Cell(0,10,'Descuento: ' . $row["descuento_aplicado"],0,1,'L');
        
        $total += $row["ve_subtotal"];
    }

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Total: $'.$total,0,1,'R'); // Alineado a la derecha
} else {
    $pdf->Cell(0,10,'No se encontraron resultados.',0,1,'C');
}

$conn->close();

$pdf->Output();
?>
