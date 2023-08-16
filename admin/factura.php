<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('logos2.jpg',60,160,90); // Ajusta las coordenadas de la imagen
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

$pdf = new PDF('P');
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

$sql = "SELECT * FROM detalles_ventas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $total = 0;

    while($row = $result->fetch_assoc()) {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0,10,'Descripción: ' . $row["nombre_producto"],0,1,'L');
        $pdf->Cell(0, 10, 'Cantidad: ' . $row["cantidad"], 0, 1, 'L');
        $pdf->Cell(0,10,'IVA: ' . $row["iva"],0,1,'L');
        $pdf->Cell(0,10,'Subtotal: ' . $row["subtotal"],0,1,'L');
        $pdf->Cell(0,10,'Descuento: ' . $row["descuento"],0,1,'L');
        
        $total += $row["subtotal"];
    }

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,'Total: $'.$total,0,1,'R');
} else {
    $pdf->Cell(0,10,'No se encontraron resultados.',0,1,'C');
}

$conn->close();

$pdf->Output('factura.pdf', 'D');

?>
