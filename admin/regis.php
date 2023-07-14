<?php 
require ('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    
    $this->SetFont('Arial','B',15);
   
    $this->Cell(60);
    
    $this->Cell(70,10,'Reporte de usuarios',1,0,'C');
    
    $this->Ln(20);

    $this->Cell(90,10,'Nombre',1,0,'C',0);
    $this->Cell(40,10,'Gmail',1,0,'C',0);
    $this->Cell(40,10,'Contrasena',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Hoja').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'conecction.php';
$consulta = "SELECT * FROM t_user";

$resultado = $mysqli->query($consulta);


$pdf = new PDF();

$pdf->AliasNbPages();

$pdf->AddPage();

$pdf->SetFont('Arial','',16);

//while ($row = $resultado->fetch_assoc()) {

    //$pdf->Cell(90,10,$row['nombre'],1,0,'C',0);

    //$pdf->Cell(40,10,$row['gmail'],1,0,'C',0);

    //$pdf->Cell(40,10,$row['contraseña'],1,0,'C',0);


//}



$pdf->Output();


?>
