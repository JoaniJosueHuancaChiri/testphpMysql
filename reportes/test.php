<?php
// Incluir la librería FPDF
include "fpdf186/fpdf.php";

class PDF extends FPDF{
    // Cabecera del reporte
    function Header(){
        // Logo o cualquier otra imagen que desees agregar
        $this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Mover a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,10,'Reporte de Asistencia',0,0,'C');
        // Salto de línea
        $this->Ln(20);
    }
    
    // Pie de página
    function Footer(){
        // Posicionamiento a 1.5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Crear instancia de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Agregar título
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Reporte de Asistencia de Empleado',0,1,'C');
$pdf->Ln(10);

// Datos ficticios de asistencia
$empleado = "Juan Pérez";
$fecha = date("Y-m-d");
$hora_entrada = "08:00";
$hora_salida = "17:00";

// Mostrar información de asistencia
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,'Nombre del Empleado: '.$empleado,0,1);
$pdf->Cell(0,10,'Fecha: '.$fecha,0,1);
$pdf->Cell(0,10,'Hora de Entrada: '.$hora_entrada,0,1);
$pdf->Cell(0,10,'Hora de Salida: '.$hora_salida,0,1);

// Output
$pdf->Output();
?>
