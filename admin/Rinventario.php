<?php
require ('fpdf/fpdf.php');

class PDF extends FPDF
{
    // ... (Las funciones de Encabezado y Pie de página permanecen sin cambios)

    function TablaCentrada($encabezados, $datos)
    {
        // Calcular el ancho total de la tabla
        $anchoTotal = array_sum($this->anchos);
        
        // Calcular la posición X de inicio para centrar la tabla
        $inicioX = ($this->GetPageWidth() - $anchoTotal) / 2;
        
        // Establecer fuente y ancho de celda
        $this->SetFont('Arial', '', 12);
        $this->SetX($inicioX);
        
        // Encabezados
        foreach ($encabezados as $clave => $columna) {
            $this->Cell($this->anchos[$clave], 10, $columna, 1, 0, 'C');
        }
        $this->Ln();
        
        // Datos
        foreach ($datos as $fila) {
            foreach ($fila as $clave => $columna) {
                $this->Cell($this->anchos[$clave], 10, $columna, 1, 0, 'C');
            }
            $this->Ln();
        }
    }
}

require 'cone.php';
$consulta = "SELECT * FROM inventario";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage(); // Formato horizontal

// Definir los encabezados de las columnas y sus anchos correspondientes
$encabezados = array('ID', 'Producto', 'Cantidad', 'Sucursal');
$pdf->anchos = array(20, 30, 20, 20);

$datos = array(); // Preparar el array de datos

while ($fila = $resultado->fetch_assoc()) {
    $datos[] = array(
        $fila['id_inventario'],
        $fila['id_producto'],
        $fila['pr_CantidadExistentes'],
        $fila['id_sucursal']
    );
}

$pdf->TablaCentrada($encabezados, $datos); // Generar la tabla centrada

$pdf->Output();


?>
